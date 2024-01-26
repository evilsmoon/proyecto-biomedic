// playground requires you to assign document definition to a variable called dd

var dd = {
    pageSize: 'A4',
    pageMargins: [40, 60, 40, 60],

    content: [

        {
            text: [
                { text: 'Biomedic', fontSize: 40, bold: true, color: '#7DBAE5' },
                { text: 'Soft\n\n', fontSize: 34 },
            ],
            alignment: 'center'
        },
        {
            text: 'Orden de trabajo',
            alignment: 'center'
        },
        {
            text: 'ID Orden:            2 \n\n',
            alignment: 'right'
        },
        {
            table: {
                widths: ['*'],
                body: [
                    [{ text: 'Información Necesaria', alignment: 'center', border: [false, true, false, true], }],
                ],
            }
        },
        {
            text: '\n\n'
        },
        {
            table: {
                widths: [150, '*'],
                body: [
                    [
                        { text: 'Solicitado por:', alignment: 'left', border: [false, true, true, true], },
                        { text: 'Carolina Basantes', alignment: 'left', border: [false, true, false, true], }
                    ],
                    [
                        { text: 'Fecha:', alignment: 'left', border: [false, true, true, true], },
                        { text: '23/01/2024', alignment: 'left', border: [false, true, false, true], }
                    ],
                    [
                        { text: 'Servicio Medico:', alignment: 'left', border: [false, true, true, true], },
                        { text: 'U.C.I', alignment: 'left', border: [false, true, false, true], }
                    ],
                    [
                        { text: 'Prioridad:', alignment: 'left', border: [false, true, true, true], },
                        { text: 'Alta', alignment: 'left', border: [false, true, false, true], }
                    ],
                    [
                        { text: ' ', alignment: 'left', border: [false, true, false, true], },
                        { text: ' ', alignment: 'left', border: [false, true, false, true], }
                    ],
                    [
                        { text: 'Nombre del equipo:', alignment: 'left', border: [false, true, false, true], },
                        { text: 'Asunto', alignment: 'center', border: [false, true, false, true], }
                    ],
                    [
                        { text: ' ', alignment: 'left', border: [false, false, false, false], },
                        { text: ' ', alignment: 'left', border: [false, false, false, false], }
                    ],


                ],

            }

        },
        {

            columnGap: 50,
            columns: [
                {
                    table: {
                        widths: ['*'],
                        body: [
                            [
                                { text: 'DESFIBRILADOR:', alignment: 'left', border: [false, true, false, false], },
                            ],
                        ]
                    }
                },
                {

                    table: {
                        widths: ['*'],
                        body: [
                            [
                                { text: 'El equipo presenta fallos en el modo ', alignment: 'center', border: [false, true, false, false], },
                            ],
                        ]
                    }
                }
            ]
        },
        {
            margin: [0, 60],
            columnGap: 50,
            columns: [
                [

                    {
                        table: {
                            widths: ['*'],
                            body: [
                                [
                                    { text: ' ', alignment: 'left', border: [false, true, false, true], },
                                ],
                            ]
                        }
                    },
                    {
                        table: {
                            widths: [100, '*'],
                            heights: [50, 50],
                            body: [
                                [
                                    { text: 'Nombre del personal asignado: ', alignment: 'left', border: [false, false, true, true], },
                                    { text: 'Eduardo Carrera', alignment: 'center', border: [false, false, false, true], },
                                ],
                            ]
                        }
                    },
                    {
                        margin: [0, 60],
                        table: {
                            widths: ['*'],
                            heights: [80],
                            body: [
                                [
                                    { text: ' ', alignment: 'left', border: [true, true, true, true], },
                                ],
                                [
                                    { text: 'Firma', alignment: 'center', border: [false, false, false, false], },
                                ]
                            ]
                        }
                    }
                ],
                [

                    {
                        table: {
                            widths: ['*'],
                            body: [
                                [
                                    { text: ' ', alignment: 'right', border: [false, true, false, true], },
                                ],
                            ],
                            alignment: 'right',
                        }
                    },
                    {
                        table: {
                            widths: [100, "*"],
                            heights: [50, 50],
                            body: [
                                [
                                    { text: 'Estado de la solicitud: ', alignment: 'left', border: [false, false, true, true], },
                                    { text: 'Aprobado', alignment: 'left', border: [false, false, false, true], },
                                ],
                            ]
                        }
                    },
                    {
                        margin: [0, 60],
                        table: {
                            widths: ['*'],
                            heights: [80],
                            body: [
                                [
                                    { text: ' ', alignment: 'left', border: [true, true, true, true], },
                                ],
                                [
                                    { text: 'Firma', alignment: 'center', border: [false, false, false, false], },
                                ]
                            ]
                        }
                    },

                ]
            ]
        }
    ],

}