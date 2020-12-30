<!doctype html>
<html>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                            <td class="title">
                                <img src="https://images.glints.com/unsafe/160x0/glints-dashboard.s3.amazonaws.com/company-logo/539a5914d30d65fd8f781b1912a267a5.jpg"
                                    style="width:30%; max-width:200px;">
                </td>
            </tr>
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
            margin-top:1px;
            padding:40px;
            width:100%;
            height:auto;
            background-color:#fff;
            text-align: center;
        }
        caption{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            font-size:20px;
            margin-bottom:10px;
            text-align: center;
        }
        table{
            border:1px solid #333;
            border-collapse:collapse;
            margin:0 auto;
            width:100%;
            text-align: center;
        }
        td, tr, th{
            padding:12px;
            border:1px solid #333;
            width:70%;
            text-align: center;
        }
        th{
            background-color: #ff3301;
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
            <caption>
            <strong>{{$model->namaasset}}</strong>
            </caption> 
                <tr> 
                    <th colspan="2">
                        <h4>Alamat  </h4>
                    </th>
                    <th colspan="2">
                        <h4>Harga </h4>
                    </th>

                    

                </tr>

                <tr>   
                    <td colspan="2">
                    {{$model->alamat}}
                    </td>
                    <td colspan="2">
                        Harga fix -> Rp {{$model->hargaa}}<br>
                        <p>Harga Jual -> Rp {{$model->harga_jual}}{{$model->satuan_jual}}<br>
                        Harga Sewa -> Rp {{$model->harga_sewa}}{{$model->satuan_sewa}}<br>
                        </p>
                    </td>
                </tr>

                


        
            <tbody>
                
                <tr>
                    <th>Status</th>
                    <th>Legal</th>
                    <th>no_legal</th>
                    <th>an_legal</th>
                </tr>
                
                <tr>
                    <td>{{$model->status}}</td>
                    <td>{{$model->legal}}</td>
                    <td>{{$model->no_legal}}</td>
                    <td>{{$model->an_legal}}</td>
                </tr>
                <tr>
                    <th>Penyewa</th>
                    <th>Masa Sewa</th>
                    <th>Tanggal Sewa</th>
                    <th>Akhir Sewa</th>
                    
                </tr>
                
                <tr>
                    <td>{{$model->namapenyewa}}</td>
                    <td>{{$model->masa_sewa}} Tahun</td>
                    <td>{{$model->tgl_sewa}}</td>
                    <td>{{$model->masa_akhir}}</td>
                </tr>

                <tr>
                    <th>L.Tanah </th>
                    <th>L.Bangunan</th>
                    <th>Lebar</th>
                    <th>Panjang</th>
                    
                    
                </tr>
                
                <tr>
                    <td>{{$model->lt}} (M<sup>2</sup>)</td>
                    <td>{{$model->lb}} (M<sup>2</sup>)</td>
                    <td>{{$model->lebar}}</td>
                    <td>{{$model->panjang}}</td>
                </tr>

                <tr>
                    <th>Kamar</th>
                    <th>K.Mandi</th>
                    <th>Listrik</th>
                    <th>Hadap</th>
                    <!-- <th>Air</th> -->
                    
                    
                </tr>
                
                <tr>
                    <td>{{$model->kamar}}</td>
                    <td>{{$model->km}}</td>
                    <td>{{$model->listrik}}</td>
                    <td>{{$model->hadap}}</td>
                    <!-- <td>{{$model->air}}</td> -->
                </tr>

                <tr> 
                
                    <th colspan="2">
                        <h4>Air  </h4>
                    </th>
                    <th colspan="2">
                        <h4>Keterangan</h4>
                    </th>

                </tr>

                <tr>   
                    <td colspan="2">
                    {{$model->air}}
                    </td>

                    <td  colspan="2">
                    </td>

                </tr>

                <tr>
                    <th>line_no</th>
                    <th>Perizinan</th>
                    <th>nomor</th>
                    <th>Tanggal</th> 
                </tr>
                @foreach ($model->perizinan as $pp)
                <tr>
                    <td>{{$pp->line_no}}</td>
                    <td>{{$pp->perizinan}}</td>
                    <td>{{$pp->nomor}}</td>
                    <td>{{$pp->tgl_izin}}</td>
                </tr> 
                @endforeach

            </tbody>

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
                                                    style="width: 200px;margin: 5px;border: 1px solid black;border-radius: 5px;">
                                            
                        @endforeach
                      </center>
                    </td>
                </tr>
                
            </table>
        
    </div>
</body>
</html>
