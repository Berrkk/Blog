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
    

    <title>Blog Düzenle| Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

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
@$id =$_GET["id"];
$cek=$db->prepare("SELECT * FROM bloglar WHERE id =:id");
$cek->bindValue(":id",$id,PDO:: PARAM_INT);
$cek->execute();
$row=$cek->fetch(PDO::FETCH_ASSOC);




if (@$_POST["submit"]) {
    $baslik=htmlspecialchars($_POST["baslik"],ENT_QUOTES,'UTF-8');
    $alt_baslik=htmlspecialchars($_POST["alt_baslik"],ENT_QUOTES,'UTF-8');
    $aciklama=htmlspecialchars($_POST["aciklama"],ENT_QUOTES,'UTF-8');
    $aktif=htmlspecialchars($_POST["aktif"],ENT_QUOTES,'UTF-8');
    $tur=htmlspecialchars($_POST["tur"],ENT_QUOTES,'UTF-8');
    
   $guncelle=$db->prepare("UPDATE `bloglar` SET `baslik`=:baslik,`alt_baslik`=:alt,`aciklama`=:aciklama,`aktif`=:aktif,`tur`=:tur WHERE `id`=:id");
   $guncelle->bindValue(":baslik",$baslik, PDO::PARAM_STR);
   $guncelle->bindValue(":alt",$alt_baslik, PDO::PARAM_STR);
   $guncelle->bindValue(":aciklama",$aciklama, PDO::PARAM_STR);
   $guncelle->bindValue(":aktif",$aktif, PDO::PARAM_INT);
   $guncelle->bindValue(":id",$id, PDO::PARAM_INT);
   $guncelle->bindValue(":tur",$tur, PDO::PARAM_INT);
    if ($guncelle->execute()) {
        header("Location: blog.php?i=eklendi");
    } 
        
}



?>
    <div id="wrapper">

       <?php require_once'inc-menu.php';
       
       
       
       
       ?>


        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Blog Düzenle (<?=$id?>) </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="blog.php">Bloglara Git</a> 
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="" method="POST" entype="multipart/form-data">
                                      
                                        <div class="form-group">
                                            <label>Başlık</label>
                                            <input class="form-control" name="baslik" Value="<?= $row["baslik"]?>" placeholder="Başlık ">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Alt Başlık</label>
                                            <input class="form-control" name="alt_baslik" Value="<?= $row["alt_baslik"]?>"   placeholder="Alt Başlık ">
                                        </div>

                                        
                                     
                                        <div class="form-group">
                                            <label>Açıklama</label>
                                            <textarea class="form-control"   name="aciklama" id = "mytextarea"rows="3"> <?= $row["aciklama"]?></textarea>
                                        
                                        <div class="form-group">
                                            <label>Durum</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif" value="1"
                                                    <?php
                                                    echo($row["aktif"]==1)?'checked':'';?>
                                                    >Aktif
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="aktif"  value="0"
                                                    <?php
                                                    echo($row["aktif"]==0)?'checked':'';?>
                                                    
                                                    >Pasif
                                                </label>
                                            </div>
                                    
                                            
                                        </div>  
                                        <div class="form-group">
                                            <label>TÜR</label>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="tur" value="1"
                                                    <?php
                                                    echo($row["tur"]==1)?'checked':'';?>
                                                    >Akadmeik
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="tur"  value="0"
                                                    <?php
                                                    echo($row["tur"]==0)?'checked':'';?>
                                                    
                                                    >Kültür&Sanat
                                                </label>
                                            </div> 
                                        <div class="form-group">
                                            <label>Dosya Yükle</label>
                                            <input type="file"name="file" value="0">
                                        </div>
                                        <input type="submit"name="submit" value="Kaydet"class="btn btn-default">
                                        <button type="reset" class="btn btn-default">Temizle</button>
                                    </form>
                                </div>
                                
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
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

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script src="https://cdn.tiny.cloud/1/gm3tr6ucp5jdvbua3ldazlitsms4pl0nz65cq6m2ffrbmfx3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
    tinymce.init({
      selector: 'textarea',
     
    });
  </script>

</body>

</html>
