<?php
require_once'inc-fonctions.php';


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Site Yönetim Paneli</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php
    @$id=intval(@$_GET["id"]);
    if (@$_GET["is"]=="aktif") 
    {
        if($_GET["drm"]==1){
            $durum=0;
        }
           else
          
        {
            $durum=1;
        }
        $aktif = $db->prepare("UPDATE bloglar SET aktif = :a  WHERE id = :i "); 
        $aktif->bindValue(":a", $durum, PDO::PARAM_INT); 
        $aktif->bindValue(":i", $id, PDO::PARAM_INT);
        if($aktif->execute()) {
            header("Location: blog.php?i=eklendi");
         }else {
          header("Location: blog.php?i=HATA");
        }
    }
    

    if (@$_GET["is"]=="sil") {
        $sil=$db->prepare("DELETE FROM bloglar WHERE id = :i");
        $sil->bindValue(":i",$id,PDO::PARAM_INT);
        if($sil->execute()) {
            header("Location: blog.php?i=eklendi");
         }else {
          header("Location: blog.php?i=HATA");
        }
    }
    
    
    
    
    
    
    
?>

    <div id="wrapper">

    <?php  require_once'inc-menu.php'; ?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bloglar</h1>
                    <?php
                    if (@$_GET["i"]=="ekle") {
                        echo"<span calss='text-success>Ekleme Başarılı</span>";
                    }
                    ?>
                    
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <a href="blog_ekle.php"class="btn btn-primary">Blog Ekle</a></h1>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Başlık</th>
                                            <th>Tarih</th>
                                            <th>Aktif</th>
                                            <th>Düzenle</th>
                                            <th>Tür</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        $cek=$db->prepare("SELECT * FROM `bloglar` ORDER BY 'id' DESC");
                                        $cek->execute();
                                        while ($row=$cek->fetch(PDO::FETCH_ASSOC)) {
                                            
                                        
                                        
                                        ?>
                                        <tr class="odd gradeX">
                                            <td><?=$row["id"]?></td>
                                            <td><?=$row["baslik"]?></td>
                                            <td><?=$row["tarih"]?></td>
                                            <td class="center">
                                               <?php if ($row["aktif"]==1) {?>
                                                <a href="blog.php?is=aktif&id=<?=$row["id"]?>&drm=
                                                <?=$row["aktif"]?>" onclick="return confirm('Aktiflik değişecek emin misin ?')
                                            "class="btn btn-success btn-xs" style="margin-riht:15px;
                                            ">Aktif</a>
                                               <?php 
                                               } else {?>
                                                <a href="blog.php?is=aktif&id=<?=$row["id"]?>&drm=
                                                <?=$row["aktif"]?>" onclick="return confirm('Aktiflik değişecek emin misin ?')
                                            "class="btn btn-danger btn-xs" style="margin-riht:15px;
                                            ">Pasif</a>
                                               <?php }?>
                                               
                                               
                                               
                                               
                                                
                                                
                                            </td>
                                            <td class="center">
                                            <a href="blog_duzenle.php?id=<?=$row["id"]?>"class="btn btn-warning btn-xs">Düzenle</a></h1>
                                            <a href="blog.php?is=sil&id=<?=$row["id"]?>" onclick="return confirm('Silmek istediğinden emin misin?')
                                            "class="btn btn-danger btn-xs" style="margin-riht:15px;
                                            ">sil</a>
                                            </td>
                                        
                                            <td class="center">
                                            <?php if ($row["tur"]==1) {?>
                                                <a href="blog_duzenle.php?is=aktif&id=<?=$row["id"]?>&tur=
                                                <?=$row["tur"]?>" onclick="return confirm('Tür değişsin mi  ?')
                                            "class="btn btn-success btn-xs" style="margin-riht:15px;
                                            ">Oyun İnceleme</a>
                                               <?php 
                                               } else {?>
                                                <a href="blog_duzenle.php?is=aktif&id=<?=$row["id"]?>&tur=
                                                <?=$row["tur"]?>" onclick="return confirm('Tür Değişsin mi ?')
                                            "class="btn btn-danger btn-xs" style="margin-riht:15px;
                                            ">Kitap İnceleme</a>
                                               <?php }?>
                                            </td>
                                        </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
