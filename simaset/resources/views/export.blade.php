<!doctype html>
<html>

<body>
<div class="col-sm-6">
              </div>
            </div>
            <div class="col-sm-6 align:right">
              <img src="https://images.glints.com/unsafe/160x0/glints-dashboard.s3.amazonaws.com/company-logo/539a5914d30d65fd8f781b1912a267a5.jpg"
                                    style="width:30%; max-width:200px;">
            </div>
            <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:center;
            font-size:12px;
            margin:0;
        }
        .container{
            margin:0 auto;
            width:100%;
            height:auto;
            background-color:#fff;
            text-align: center;
        }
        caption{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            font-size:12px;
            text-align: left;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
            text-align: center;
        }
        pre{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
            text-align: left;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            margin-left:100px;
            width:70%;
            text-align: left;
        }
        th{
            background-color: #969da3;
            text-align: center;
            color:#ffffff;
        }
        h4, p{
            margin:1px;
            text-align: center;
        }

    </style>
</head>
<body>
             <div class="container">
        <table>
                <tr> 
                    <th colspan="4">
                        <h4>SIA-{{$model->id}}  </h4>
                    </th>
                    <!-- <th colspan="2">
                        <h4>Harga </h4>
                    </th> -->
                </tr>

                <tr>   
                    <td colspan="4">
            <pre>
            Nama Asset      ->  {{$model->namaasset}}<br>
            Status          ->  {{$model->status}}<br>
            Lokasi          -> {{$model->alamat}}<br>
            LT / LB         ->  {{$model->lt}} / {{$model->lb}}<br>
            Lebar x Panjang ->  {{$model->lebar}} x {{$model->panjang}}<br>
            Ruang / KM      ->  {{$model->kamar}} / {{$model->km}}<br>
            Daya Listrik    ->  {{$model->listrik}}<br>
            air             ->  {{$model->air}}<br>
            Legalitas       ->  {{$model->legal}}<br>
            Menghadap       ->  {{$model->hadap}}<br>
            Perizinan       ->  {{$model->harga_sewa}}<br>
            </pre>
                    </td>
                </tr>


 
                <caption>
                <br>
            </caption> 


                

            <table>
                <tr bgcolor='#FFFAFA'>
                    <td colspan="2">
                        <center>
                          FOTO ASSET
                          <center>
                          <br><br>
                       
                       @foreach ($model->dokumentasi as $r)
                                                <!-- <span>{{$r->file_name}}</span> -->
                                                @php 
                                                    $link = "http://localhost/sim/sim/simaset/simaset-project/simaset/";
                                                @endphp
                                                <img src="{{$link.$r->url}}"
                                                    style="width: 200px;height: 200 px;margin: 5px;border: 1px solid black;border-radius: 5px;">
                                            
                        @endforeach
                      </center>
                    </td>
                </tr>
                
            </table>
        
    </div>
</body>
</html>
