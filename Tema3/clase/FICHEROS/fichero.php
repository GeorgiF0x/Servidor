<?php
    include("/var/www/Servidor/Fragmentos/header.html");
    ?>
<div class="text-center mt-4 ">
    <h1>Ficheros</h1>
<?php
    //antes de nada comprobar si existe el fichero
    // if(file_exists("./fichero.txt")){
    //     echo "existe<BR>";
    //     if(!$fp=fopen("./fichero.txt","r")){
    //         echo "ha habido ningun problema al abrir el fichero";
    //     }else{
    //         // ***************************LEER************************
    //         $leido=fread($fp,filesize("./fichero.txt"));
    //             echo"<span class='fst-italic fw-bold'> $leido</span>";
    //         }
    //     }
    // fclose
    // else{
    //     echo "<span class='text-danger'>el fichero no existe</span>";
    // }


     //antes de nada comprobar si existe el fichero
    //  if(file_exists("./fichero.txt")){
    //      echo "existe<BR>";}else{
    //                 echo "<span class='text-danger'>el fichero no existe</span>";

    //     }
    //     if(!$fp=fopen("./fichero.txt","a")){
    //         echo "ha habido ningun problema al abrir el fichero";
    //     }else{
    //         // ***************************ESCRIBIR************************
    //         $texto="escribiendo......ay causa";
    //         if(!fwrite($fp,$texto,strlen($texto))){
    //             echo "ha habido un problema al escribir el fichero";
    //         }
    //         fclose($fp);
    //     }


        // if(file_exists("./fichero.txt")){
        //     echo "existe<BR>";}else{
        //                echo "<span class='text-danger'>el fichero no existe</span>";
   
        //    }
        //    if(!$fp=fopen("./fichero.txt","a")){
        //        echo "ha habido ningun problema al abrir el fichero";
        //    }else{
        //        // ***************************ESCRIBIR EN DETERMINADA POSICION************************
        //        $texto="escribiendo......ay causa";
        //        fseek($fp,28);
        //        if(!fwrite($fp,$texto,strlen($texto))){
        //            echo "ha habido un problema al escribir el fichero";
        //        }
    

        //        fclose($fp);
        //    }
    

    
        //    if(file_exists("./ficheroLineas.txt")){
        //     echo "existe<BR>";}else{
        //                echo "<span class='text-danger'>el fichero no existe</span>";
   
        //    }
        //    if(!$fp=fopen("./ficheroLineas.txt","r")){
        //        echo "ha habido ningun problema al abrir el fichero";
        //    }else{
      
        //     //    if(!fwrite($fp,$texto,strlen($texto))){
        //     //        echo "ha habido un problema al escribir el fichero";
        //     //    }else{

        //         while($leido=fgets($fp,filesize("ficheroLineas.txt"))){
        //             echo"<span class='fst-italic fw-bold'>\n $leido</span>";
        //         }
        //         fclose($fp);
        //        }

        
        //         if(file_exists("./fichero.txt")){
        //     echo "existe<BR>";}else{
        //                echo "<span class='text-danger'>el fichero no existe</span>";
   
        //    }
        //    if(!$fp=fopen("./ficheroLineas.txt","a")){
        //        echo "ha habido ningun problema al abrir el fichero";
        //    }else{
        //        // ***************************ESCRIBIR LINEA POR LINEA************************
        //        $texto="\nnueva linea ";
        //        if(!fputs($fp,$texto,strlen($texto))){
        //             echo "error al escribir";
        //        }
        //        fclose($fp);
        //    }

        
        
 
        //para manipular un fichero de forma secuancial se crea una copia sobre la que se trabaja se borra el anterior y se renombra la copia
        

        //fichero temporal
        $tmp=tempnam('-',"tem.txt");
   if(file_exists("./ficheroLineas.txt")){
            echo "existe<BR>";}else{
                       echo "<span class='text-danger'>el fichero no existe</span>";
   
           }
           if((!$fp=fopen("./ficheroLineas.txt","r"))||(!$ft=fopen($tmp,"w"))){
               echo "ha habido ningun problema al abrir el fichero";
           }else{
                $texto="linea nuevaASDASD \n";
                $contador=1;
                while($leido=fgets($fp,filesize("ficheroLineas.txt"))){
                    fputs($ft,$leido,strlen($leido));
                        if($contador==1){
                            fputs($ft,$texto,strlen($texto));
                            $contador++;
                        }
                    
                }
                fclose($fp);
                fclose($ft);
                unlink("ficheroLineas.txt");
                rename($tmp,"ficheroLineas.txt");
               }
           
    


 





    
?>
</div>