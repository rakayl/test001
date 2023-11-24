@extends('layout.main')
@section('title', 'Daftar Mesin')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">History</h1>
    <p class="mb-4">Berikut merupakan data History Approved</p>

    <div class="row px-3 py-3">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="mytable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kode Mesin</th>
                            <th>Name Approved</th>
                            <th>Note</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    </body>
    <script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
      
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
        {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
        var t= $("#mytable").DataTable({
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $("td:eq(0)", row).html(index);
            },
            processing: true,
            serverSide: true,
            scrollX: true,
            scrollCollapse: true,
            responsive: true,
            ajax: {
                "url": "{{url('history/getDtRowData')}}",
                "type": "POST"
            },
            columns: [
                {
                    data: "id",
                    class: "text-center",
                    orderable: false,
                    render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                           } 
                },
                {
                    data : 'data_mesin.kode_jenis',
                    class: "text-center action-column",
                },
                {
                    data : 'user.name',
                    class: "text-center",
                },
                {
                    data : 'note',
                    class: "text-center",
                },
                {
                    data : 'created_at',
                    class: "text-center",
                },
            ],
            order: [[1, "desc"]],
        });
    });
</script>


    <style>
        /* Custom styles for all modals */
        .modal {
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            background-color: #007bff;
            color: #ffffff;
            border-bottom: 1px solid #dee2e6;
        }

        .modal-title {
            font-weight: bold;
        }

        .modal-body {
            padding: 20px;
        }

        .modal-footer {
            border-top: 1px solid #dee2e6;
            padding: 15px;
        }

        .close {
            font-size: 1.5rem;
            font-weight: bold;
            line-height: 1;
            color: #00000;
            opacity: 0.75;
        }

        /* Styling for the buttons in the footer */
        .modal-footer .btn {
            margin-right: 10px;
        }




        /* Style for the table */
        .table.table-bordered thead th {
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        .table.table-bordered tbody td {
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
        }

        /* Adjust column widths */
        .table.table-bordered th:nth-child(1),
        .table.table-bordered td:nth-child(1) {
            width: 10%;
        }

        .table.table-bordered th:nth-child(2),
        .table.table-bordered td:nth-child(2) {
            width: 10%;
        }

        .table.table-bordered th:nth-child(3),
        .table.table-bordered td:nth-child(3) {
            width: 15%;
        }

        .table.table-bordered th:nth-child(4),
        .table.table-bordered td:nth-child(4) {
            width: 8%;
        }

        .table.table-bordered th:nth-child(5),
        .table.table-bordered td:nth-child(5) {
            width: 10%;
        }

        .table.table-bordered th:nth-child(6),
        .table.table-bordered td:nth-child(6) {
            width: 12%;
        }

        .table.table-bordered th:nth-child(7),
        .table.table-bordered td:nth-child(7) {
            width: 10%;
        }

        .table.table-bordered th:nth-child(8),
        .table.table-bordered td:nth-child(8) {
            width: 5%;
        }

        .table.table-bordered th:nth-child(9),
        .table.table-bordered td:nth-child(9) {
            width: 5%;
        }

        .table.table-bordered th:nth-child(10),
        .table.table-bordered td:nth-child(10) {
            width: 10%;
        }
    </style>
    @endsection