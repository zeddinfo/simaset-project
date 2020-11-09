<!doctype html>
<html>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://images.glints.com/unsafe/160x0/glints-dashboard.s3.amazonaws.com/company-logo/539a5914d30d65fd8f781b1912a267a5.jpg"
                                    style="width:30%; max-width:200px;">
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <!-- <tr class="heading">
                <td>
                    Details Asset
                </td>

                <td>

                </td>
            </tr>  -->
            <style>
        body{
            font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            color:#333;
            text-align:center;
            font-size:18px;
            margin:0;
        }
        .container{
            margin:0 auto;
            margin-top:10px;
            padding:40px;
            width:100%;
            height:auto;
            background-color:#fff;
            text-align: center;
        }
        caption{
            font-size:28px;
            margin-bottom:15px;
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
            width:100%;
            text-align: center;
        }
        th{
            background-color: #f0f0f0;
            text-align: center;
        }
        h4, p{
            margin:0px;
            text-align: center;
        }
    </style>
</head>
<body>
             <div class="container">
        <table>
            <!-- <caption>
                Simaset
            </caption>  -->
            <thead>
                <tr class = "heading">
                    <th colspan="3"><strong>{{$model->namaasset}}</strong></th>
                    <th>{{$model->created_at}}</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <h4>Alamat: </h4>
                        
                        <p>{{$model->alamat}}

                        </p>
                    </td>
                    <td colspan="2">
                        <h4>Harga: </h4>
                        <p>Harga Jual -> Rp {{$model->harga_jual}}{{$model->satuan_jual}}<br>
                        Harga Sewa -> Rp {{$model->harga_sewa}}{{$model->satuan_sewa}}<br>
                        
                        </p>
                    </td>
                </tr>
            </thead>
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
                    <td>{{$model->masa_sewa}}</td>
                    <td>{{$model->tgl_sewa}}</td>
                    <td>{{$model->masa_akhir}}</td>
                </tr>

                <tr>
                    <th>L.Tanah</th>
                    <th>L.Bangunan</th>
                    <th>Lebar</th>
                    <th>Panjang</th>
                    
                    
                </tr>
                
                <tr>
                    <td>{{$model->lt}}</td>
                    <td>{{$model->lb}}</td>
                    <td>{{$model->lebar}}</td>
                    <td>{{$model->panjang}}</td>
                </tr>

                <tr>
                    <th>KAMAR</th>
                    <th>K.Mandi</th>
                    <th>Listrik</th>
                    <th>Hadap</th>
                    
                    
                </tr>
                
                <tr>
                    <td>{{$model->kamar}}</td>
                    <td>{{$model->km}}</td>
                    <td>{{$model->listrik}}</td>
                    <td>{{$model->hadap}}</td>
                </tr>
 
                <!-- <tr>
                    <th>line_no</th>
                    <th>Perizinan</th>
                    <th>nomor</th>
                    <th>Tanggal</th>
                    
                    
                </tr>
                
                <tr>
                    <td>{{$model->line_no}}</td>
                    <td>{{$model->perizinan}}</td>
                    <td>{{$model->nomor}}</td>
                    <td>{{$model->tgl_izin}}</td>
                </tr>  -->

                
               
                <!-- <tr>
                    <th colspan="3">lebar</th>
                    <td>{{$model->lebar}}</td>
                </tr> --> 
                <!-- <tr>
                    <th>Pajak</th>
                    <td></td>
                    <td>2%</td>
                    <td>{{$model->kamar}}</td>
                </tr> -->

            </tbody>
            <!-- <tfoot> -->
                <!-- <tr>
                    <th colspan="3">Listrik</th>
                    <td>{{$model->listrik}}</td>
                </tr> -->
            <!-- </tfoot> -->



            <!-- <tr class="heading">
                <td>
                    Gambar
                </td>
                <td>

                </td>
            </tr> -->
            <!-- display:inline; -->
            <table>
                
                @foreach ($model->perizinan as $pp)
                <tr>
                  <td>
                      
                      <tr>
                    <th>line_no</th>
                    <th>Perizinan</th>
                    <th>nomor</th>
                    <th>Tanggal</th>
                    
                    
                </tr>
                
                <tr>
                    <td>{{$model->line_no}}</td>
                    <td>{{$model->perizinan.$pp}}</td>
                    <td>{{$model->nomor.$pp}}</td>
                    <td>{{$model->tgl_izin.$pp}}</td>
                </tr> 
                 
                  </td>
                </tr>
                @endforeach
            </table>


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
        
    </div>
</body>
</html>
