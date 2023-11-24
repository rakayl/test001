@extends('layout.main')
@section('title', 'Daftar Mesin')
@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Data Mesin</h1>
    <p class="mb-4">Berikut merupakan data Mesin di Maintenance</p>

    @if(Session::has('berhasil'))
    <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Success,</strong>
        {{ Session::get('berhasil') }}
    </div>
    @endif
    <div class="row justify-content-start">
       @role('administrator')
            <div class="col-6">
                <a href="{{url('data-mesin/create')}}" class="btn btn-primary btn-icon-split btn-sm mb-3" id="addRowButton">Tambah Data Mesin</a>
                <a href="{{url('/history')}}" class="btn btn-primary btn-icon-split btn-sm mb-3" id="addRowButton">History Approve</a>
            </div>
       @endrole
    </div>
    <div class="row px-3 py-3">
        <div class="col-lg-12">
            <div class="table-responsive">
                <table class="table table-striped- table-bordered table-hover table-checkable" id="mytable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Approve</th>
                            <th>No.Registrasi</th>
                            <th>Katgeori Mesin</th>
                            <th>Klasifikasi Mesin</th>
                            <th>Nama Mesin</th>
                            <th>Type</th>
                            <th>Merk</th>
                            <th>Spesifikasi</th>
                            <th>Pabrikan</th>
                            <th>Kapasitas</th>
                            <th>Tahun Mesin</th>
                            <th>Lokasi</th>
                            @role('administrator')
                                <th>Ubah</th>
                            @endrole
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

   
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modal-form" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-form-title">Approve</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <div class="modal-body">
                    <form class="kt-form" id="form-modal">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="nama" class="form-label">Nama Data Mesin</label>
                                <textarea class="form-control" type="text" name="note" id="note" placeholder="Note"></textarea>
                            </div>
                            
                        </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" id="data_mesin_id" name="data_mesin_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-batal">Batal</button>
                    <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
                </div>
                </form>

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
            ajax: {
                "url": "{{url('data-mesin/getDtRowData')}}",
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
                    data : 'status',
                    class: "text-center action-column",
                },
                {
                    data : 'kode_jenis',
                    class: "text-center",
                },
                {
                    data : 'kategori.nama_kategori',
                    class: "text-center",
                },
                {
                    data : 'klasifikasi.nama_klasifikasi',
                    class: "text-center",
                },
                {
                    data : 'nama_mesin',
                    class: "text-center",
                },
                {
                    data : 'type_mesin',
                    class: "text-center",
                },
                {
                    data : 'merk_mesin',
                    class: "text-center",
                },
                {
                    data : 'min_max',
                    class: "text-center",
                },
                {
                    data : 'pabrik',
                    class: "text-center",
                },
                {
                    data : 'kapasitas',
                    class: "text-center",
                },
                {
                    data : 'tahun_mesin',
                    class: "text-center",
                },
                {
                    data : 'lok_ws',
                    class: "text-center",
                },
                @role('administrator')
                {
                    data: "action",
                    name: "action",
                    class: "text-center action-column",
                    orderable: false,
                    searchable: false
                }
                @endrole
            ],
            order: [[1, "desc"]],
        });
         $("#mytable tbody").on( "click", "button.delete-data", function () {
            var id = $(this).val();
            url = "{{url('data-mesin/delete/:id')}}";
            url = url.replace(":id",id);
            Swal.fire({
                title: "Anda yakin ingin menghapus?",
                text: "Data akan dihapus",
                type: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, Hapus",
                cancelButtonText: "Tidak, Batal",
                closeOnConfirm: false,
                closeOnCancel: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                $.ajax({
                    type: "POST",
                    url: url,
                    success: function (data) {
                        Swal.fire({
                            title: "Sukses",
                            text: "Data berhasil dihapus.",
                            timer: 3000,
                            type: "success"
                        });
                        $("#mytable").DataTable().ajax.reload(null, false);
                    },
                    error: function (data) {
                        Swal.fire({
                            title: "Gagal",
                            text: "Data gagal dihapus.",
                            timer: 3000,
                            type: "error"
                        });
                    }
                });
                }
            })
        });
        $("#form-modal").on("submit", (function (e) {
            e.preventDefault();
            var data = new FormData();
            data.append('note', $("#note").val());
            data.append('data_mesin_id', $("#data_mesin_id").val());
            var type = "POST";
            var url = "{{url('data-mesin/approved')}}";
            $.ajax({
                type: type,
                url: url,
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function (data) {
                    var obj = jQuery.parseJSON(JSON.stringify(data));
                    if (obj.status) {
                        Swal.fire({
                            title: "Sukses",
                            text: obj.pesan,
                            icon: "success",
                            timer: 3000,
                            type: "success"
                        });
                        $("#mytable").DataTable().ajax.reload(null, false);
                        $("#form-modal").trigger("reset");
                        $("#modal-form").modal("hide");
                    }else{
                        var error="";
                        $.each(obj.pesan, function(index, value) {
                            error+=value+"<br>";
                        });
                        Swal.fire({
                            title: "Gagal",
                            html: error,
                            type: "error"
                        });
                    }
                },
                error: function (data) {
                    Swal.fire({
                        title: "Gagal",
                        text: "Gagal menyimpan data.",
                        timer: 3000,
                        type: "error"
                    });
                }
            });
        }));
        $('#mytable tbody').on( 'click', 'button.update-data', function () {
            var data = t.row( $(this).parents('tr') ).data();
            $("#form-modal").trigger("reset");
            $("#modal-form").modal("show"); 
            $("#data_mesin_id").val(data.id);
            $("#modal-form-title").text("Approve Data Mesin");
            $("#btn-simpan").val("edit");

        } );
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