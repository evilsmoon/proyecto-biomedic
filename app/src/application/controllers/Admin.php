<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $allowed_roles = array('Administrador', 'Tecnico');
        $user_role = $this->session->userdata('Role');

        if (!in_array($user_role, $allowed_roles)) {
            redirect(base_url()); // Redirige si el rol no está permitido
        }
        $this->load->library('upload');
        $this->load->model('M_Admin');
    }


    public function index()
    {
        $data['equipos'] = $this->M_Admin->obtenerEquipos();
        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('admin/templates/Sidebar');
        $this->load->view('admin/Inventario', $data);
        $this->load->view('admin/forms/Form_Inventario');
        $this->load->view('admin/forms/Form_Formulario');
        $this->load->view('admin/forms/Form_Upload.php');
        $this->load->view('admin/templates/Footer');
    }


    public function agregar()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $data = array(
                'numero_inventario' => $this->input->post('numero_inventario'),
                'ubicacion' => $this->input->post('ubicacion'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'area' => $this->input->post('area'),
                'nombre_equipo' => $this->input->post('nombre_equipo'),
                'serie' => $this->input->post('serie'),
                'funcionalidad' => $this->input->post('funcionalidad'),
            );

            $this->M_Admin->insertarEquipo($data);
        }
        if ($this->session->userdata('Role') == 'Administrador') {
            redirect('Admin');
        } else {
            redirect('Doctor');
        }
    }


    public function editar()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id = $this->input->post('id');

            $data = array(
                'numero_inventario' => $this->input->post('numero_inventario'),
                'ubicacion' => $this->input->post('ubicacion'),
                'marca' => $this->input->post('marca'),
                'modelo' => $this->input->post('modelo'),
                'area' => $this->input->post('area'),
                'nombre_equipo' => $this->input->post('nombre_equipo'),
                'serie' => $this->input->post('serie'),
                'funcionalidad' => $this->input->post('funcionalidad'),
            );

            $res = $this->M_Admin->actualizarEquipo($id, $data);
            if ($this->session->userdata('Role') == 'Administrador') {
                redirect('Admin');
            } else {
                redirect('Doctor');
            }
        }
        if ($this->session->userdata('Role') == 'Administrador') {
            redirect('Admin');
        } else {
            redirect('Doctor');
        }
    }

    public function eliminar()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $id = $this->input->get('id');

            $res = $this->M_Admin->eliminarEquipo($id);

            echo $res;
        }
    }

    //public function eliminarUsuario()
    //{
    //    if ($this->input->server('REQUEST_METHOD') === 'POST') {
    //        $id = $this->input->post('id');

    //        $resp = $this->M_Admin->eliminar_usuario($id);
    //        echo  $resp;
    //   }
    //}

    public function eliminar_usuario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $id = $this->input->get('id');

            $resp = $this->M_Admin->eliminarUsuario($id);
            echo  $resp;
        }
    }


    public function detallesFormulario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {

            $id = $this->input->get('id');
            $detalles = $this->M_Admin->obtenerDetallesEquiposFormulario($id);
            header('Content-Type: application/json');
            echo json_encode($detalles);
        }
    }

    public function obtenerEquipo()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            $id = $this->input->get('id');
            $equipo = $this->M_Admin->obtenerEquipoPorId($id);
            header('Content-Type: application/json');
            echo json_encode($equipo);
        }
    }

    public function agregarEquipoFormulario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $idEquipo = $this->input->post('idEquipo');
            $nivel_riesgpo = $this->input->post('nivel_riesgpo');
            $funcion_equipo = $this->input->post('funcion_equipo');
            $requisitos_mantenimiento = $this->input->post('requisitos_mantenimiento');
            $tipo_desgaste = $this->input->post('tipo_desgaste');
            $frecuencia_uso = $this->input->post('frecuencia_uso');
            $averias_equipo = $this->input->post('averias_equipo');

            $respnivel_riesgpo = $this->M_Admin->obtener_pregunta_por_indice($nivel_riesgpo);
            $respfuncion_equipo = $this->M_Admin->obtener_pregunta_por_indice($funcion_equipo);
            $resprequisitos_mantenimiento = $this->M_Admin->obtener_pregunta_por_indice($requisitos_mantenimiento);
            $resptipo_desgaste = $this->M_Admin->obtener_pregunta_por_indice($tipo_desgaste);
            $respfrecuencia_uso = $this->M_Admin->obtener_pregunta_por_indice($frecuencia_uso);
            $respaverias_equipo = $this->M_Admin->obtener_pregunta_por_indice($averias_equipo);

            $data = array(
                'equipo_id' => $idEquipo,
                'id_RF' => $respnivel_riesgpo[0]['id'],
                'indice_pre_RF' => $respnivel_riesgpo[0]['indice_pregunta'],
                'valor_RF' => $respnivel_riesgpo[0]['ponderacion'],
                'id_FE' => $respfuncion_equipo[0]['id'],
                'indice_pre_FE' => $respfuncion_equipo[0]['indice_pregunta'],
                'valor_FE' => $respfuncion_equipo[0]['ponderacion'],
                'id_RM' => $resprequisitos_mantenimiento[0]['id'],
                'indice_pre_RM' => $resprequisitos_mantenimiento[0]['indice_pregunta'],
                'valor_RM' => $resprequisitos_mantenimiento[0]['ponderacion'],
                'id_DM' => $resptipo_desgaste[0]['id'],
                'indice_pre_DM' => $resptipo_desgaste[0]['indice_pregunta'],
                'valor_DM' => $resptipo_desgaste[0]['ponderacion'],
                'id_FU' => $respfrecuencia_uso[0]['id'],
                'indice_pre_FU' => $respfrecuencia_uso[0]['indice_pregunta'],
                'valor_FU' => $respfrecuencia_uso[0]['ponderacion'],
                'id_AE' => $respaverias_equipo[0]['id'],
                'indice_pre_AE' => $respaverias_equipo[0]['indice_pregunta'],
                'valor_AE' => $respaverias_equipo[0]['ponderacion'],
                // Suma total de las ponderaciones
                'valor_FMP' => $respnivel_riesgpo[0]['ponderacion'] +
                    $respfuncion_equipo[0]['ponderacion'] +
                    $resprequisitos_mantenimiento[0]['ponderacion'] +
                    $resptipo_desgaste[0]['ponderacion'] +
                    $respfrecuencia_uso[0]['ponderacion'] +
                    $respaverias_equipo[0]['ponderacion'],
            );

            $resp =  $this->M_Admin->crearActualizarFormularioEquipo($data);
            if ($resp) {
                $respEquipo = $this->M_Admin->obtener_info_equipo_por_id($idEquipo);

                $frecuencia_mantenimiento =  '';
                if ($respEquipo) {
                    if ($respEquipo->valor_FMP >= 21) {
                        $frecuencia_mantenimiento = 'Trimestral';
                    } elseif ($respEquipo->valor_FMP >= 15 && $respEquipo->valor_FMP <= 20) {
                        $frecuencia_mantenimiento = 'Semestral';
                    } elseif ($respEquipo->valor_FMP >= 1 && $respEquipo->valor_FMP <= 14) {
                        $frecuencia_mantenimiento = 'Anual';
                    }

                    $datos_mantenimiento = array(
                        'id_equipo' => $respEquipo->equipo_id,
                        'numero_inventario' => $respEquipo->numero_inventario,
                        'frecuencia_mantenimiento' => $frecuencia_mantenimiento,
                        'nombre_equipo' => $respEquipo->nombre_equipo,
                        'servicio_medico' => $respEquipo->area
                    );
                    $this->M_Admin->insertar_actualizar_mantenimiento($datos_mantenimiento);
                    $this->M_Admin->insertar_actualizar_cronograma($datos_mantenimiento['id_equipo'], $datos_mantenimiento['frecuencia_mantenimiento'], date('W'));
                }
            }
        }
        redirect('Admin/preventivo');
    }

    public function obtener_formulario_equipo()
    {
        if ($this->input->is_ajax_request()) {
            $id = $this->input->get('id');

            $resp = $this->M_Admin->obtener_formulario_equipo($id);

            echo json_encode($resp);
        }
    }

    public function usuarios()
    {
        $data['usuarios'] = $this->M_Admin->obtenerUsuarios();
        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('admin/templates/Sidebar');
        $this->load->view('admin/Usuarios.php', $data);
        $this->load->view('admin/forms/Form_Usuario');
        $this->load->view('admin/templates/Footer');
    }

    public function crear_usuario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Obtener datos del formulario
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $email = $this->input->post('email');
            $clave = $this->input->post('clave');
            $perfil = $this->input->post('perfil');

            // Insertar datos en la base de datos
            $data = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'clave' => $clave,
                'id_perfil' => $perfil
            );

            $resp = $this->M_Admin->insertar_usuario($data);

            // Redirigir a la página principal o a donde sea necesario después de la inserción
            redirect('Admin/usuarios');
        }
    }

    public function editar_usuario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            // Obtener datos del formulario
            $id = $this->input->post('id');
            $nombre = $this->input->post('nombre');
            $apellido = $this->input->post('apellido');
            $email = $this->input->post('email');
            $clave = $this->input->post('clave');
            $perfil = $this->input->post('perfil');

            // Insertar datos en la base de datos
            $data = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'clave' => $clave,
                'id_perfil' => $perfil
            );

            $resp = $this->M_Admin->update_usuario($id, $data);

            // Redirigir a la página principal o a donde sea necesario después de la inserción
            redirect('Admin/usuarios');
        }
    }

    public function obtenerUsuario()
    {
        if ($this->input->server('REQUEST_METHOD') === 'GET') {
            // Obtener datos del formulario
            $usuarioiD = $this->input->get('id');

            $resp = $this->M_Admin->obtenerUsuarioPorID($usuarioiD);

            header('Content-Type: application/json');
            echo json_encode($resp);
        }
    }

    public function ordentrabajo()
    {
        $data['ordenes'] = $this->M_Admin->obtenerOrdenesTrabajo();
        $users['tecnicos'] = $this->M_Admin->obtenerTecnicos();
        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('admin/templates/Sidebar');
        $this->load->view('admin/OrdenTrabajo', $data);
        $this->load->view('admin/forms/Form_AsignarTrabajo', $users);
        $this->load->view('admin/templates/Footer');
    }


    public function asignar_tecnico()
    {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id_cronograma = $this->input->post('id_cronograma');
            $tecnico_asignado = $this->input->post('tecnico_asignado');
            $semana_asignada = $this->input->post('semana_asignada');

            $data = array(
                'usuario_id' => $tecnico_asignado,
            );

            $this->M_Admin->asignarTecnico($id_cronograma, $data);
            redirect('Admin/cronograma');
        }
    }

    public function asignar_trabajo()
    {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $id_orden = $this->input->post('id_orden');
            $personal_asignado = $this->input->post('personal_asignado');

            $data = array(
                'personal_asignado' => $personal_asignado,
                'estado' => 'ASIGNADO',
            );

            $resp = $this->M_Admin->asignarTrabajo($id_orden, $data);
            redirect('Admin/ordentrabajo');
        }
    }

    /* 
     ! Inventario Masivo
    */
    public function file_upload()
    {

        $config['upload_path'] =  APPPATH . '../assets/uploads/';
        $config['allowed_types'] = 'xlsx|csv|xls';
        $config['max_size'] = 20480;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('input_File')) {
            // Error al subir el archivo
            $error = array('error' => $this->upload->display_errors());
            // Manejar el error como sea necesario (redirigir a una página de error, mostrar mensaje, etc.)
            redirect("Admin");
        } else {
            // Archivo subido correctamente
            $uploaded_data = $this->upload->data();
            $file_path = APPPATH . '../assets/uploads/' . $uploaded_data['file_name'];
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            $spreadsheet = $reader->load($file_path);
            $sheetData = $spreadsheet->getActiveSheet()->toArray();


            echo "<pre>";
            foreach ($sheetData as $row) {

                if (!$this->M_Admin->equipo_existe_por_numero_inventario($row[0])) {

                    $data = array(
                        'numero_inventario' => $row[0],
                        'area' => $row[1],
                        'ubicacion' => $row[2],
                        'nombre_equipo' => $row[3],
                        'marca' => $row[4],
                        'modelo' => $row[5],
                        'serie' => $row[6],
                        'funcionalidad' => $row[7],
                    );
                    // Haz lo que necesites con cada conjunto de datos
                    $this->M_Admin->insertarEquipo($data);
                }
            }
            /* 
            funCHatGPT($file_path)
            /* como eliminar un archgiuvos desde php con el path */
            redirect("Admin");
        }
    }

    public function fichas_tecnicas()
    {
        $data['fichas'] = $this->M_Admin->obtener_todas_las_fichas();


        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        if ($this->session->userdata('Role') == 'Administrador') {
            $this->load->view('admin/templates/Sidebar');
        } else {
            $this->load->view('doctors/templates/Sidebar');
        }

        $this->load->view('doctors/FichasTecnicas', $data);
        $this->load->view('doctors/forms/Form_Ficha');
        $this->load->view('admin/templates/Footer');
    }


    public function preventivo()
    {
        $data['mantenimientos'] = $this->M_Admin->obtener_mantenimientos();
        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('admin/templates/Sidebar');
        $this->load->view('admin/Preventivo', $data);
        $this->load->view('admin/templates/Footer');
    }


    public function cronograma()
    {
        $data['cronogramas'] = $this->M_Admin->obtenerCronograma();
        $users['tecnicos'] = $this->M_Admin->obtenerTecnicos();
        $this->load->view('admin/templates/Header');
        $this->load->view('admin/templates/Navbar');
        $this->load->view('admin/templates/Sidebar');
        $this->load->view('admin/Cronograma', $data);
        $this->load->view('admin/forms/Form_Asignar', $users);
        $this->load->view('admin/templates/Footer');
    }
}

/* 

	$inputTileType = \PhpOffice\PhpSpreadsheet\IOFactory::identify($inputFileName);
				$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputTileType);
				$spreadsheet = $reader->load($inputFileName);
				$sheet = $spreadsheet->getSheet(0);
				$count_Rows = 0;
				foreach($sheet->getRowIterator() as $row)
				{
					$name = $spreadsheet->getActiveSheet()->getCell('A'.$row->getRowIndex());
					$mobile = $spreadsheet->getActiveSheet()->getCell('B'.$row->getRowIndex());
					$email = $spreadsheet->getActiveSheet()->getCell('C'.$row->getRowIndex());
					$address = $spreadsheet->getActiveSheet()->getCell('D'.$row->getRowIndex());
					$data = array(
						'name'=> $name,
						'email'=> $email,
						'mobile'=> $mobile,
						'address'=> $address,
					);

					$this->db->insert('users',$data);
					$count_Rows++;
				}
*/