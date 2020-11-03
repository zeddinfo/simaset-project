<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>export - {{$model->namaasset}}</title>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }

    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://www.sparksuite.com/images/logo.png"
                                    style="width:100%; max-width:300px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Details
                </td>

                <td>

                </td>
            </tr>

            <tr class="details">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <h4><b>Nama : </b>{{$model->namaasset}}</h4>
                                <h4><b>Lokasi : </b>{{$model->lokasi}}</h4>
                                <br>
                                <h4><b>LT/LB : </b>{{$model->lt}} / {{$model->lb}} M2</h4>
                                <h4><b>Lebar x Panjang : </b>{{$model->lebar}} x {{$model->panjang}}</h4>
                                <h4><b>Ruang / KM : </b>{{$model->kamar}} / {{$model->km}}</h4>
                                <h4><b>Daya Listrik : </b>{{$model->listrik}}</h4>
                                <h4><b>Air : </b>{{$model->air}}</h4>
                                <h4><b>Legalitas : </b>{{$model->legal}} NOMOR {{$model->no_legal}}</h4>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    Gambar
                </td>
                <td>

                </td>
            </tr>
            <table>
                <tr bgcolor='#A9A9A9'>
                    <td colspan="2">
                        <center>
                          FOTO ASSET
                    </td>
                </tr>
                @foreach ($model->dokumentasi as $r)
                <tr>
                  <td>
                      <center>
                        <img src="{{url('/storage/file/foto/'.$r->file_name)}}"
                        style="width: 400px;margin: 5px;border: 1px solid black;border-radius: 5px;">
                      </center>
                  </td>
                </tr>
                @endforeach
            </table>
        </table>
    </div>
</body>

</html>
