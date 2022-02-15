
<?php
include 'includes/header.php';
include 'db/conn.php';

$file = '[{"bodyPart":"waist","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0001.gif","id":"0001","name":"3/4 sit-up","target":"abs"},{"bodyPart":"waist","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0002.gif","id":"0002","name":"45° side bend","target":"abs"},{"bodyPart":"waist","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0003.gif","id":"0003","name":"air bike","target":"abs"},{"bodyPart":"upper legs","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/1512.gif","id":"1512","name":"all fours squad stretch","target":"quads"},{"bodyPart":"waist","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0006.gif","id":"0006","name":"alternate heel touchers","target":"abs"},{"bodyPart":"back","equipment":"cable","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0007.gif","id":"0007","name":"alternate lateral pulldown","target":"lats"},{"bodyPart":"lower legs","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/1368.gif","id":"1368","name":"ankle circles","target":"calves"},{"bodyPart":"back","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/3293.gif","id":"3293","name":"archer pull up","target":"lats"},{"bodyPart":"chest","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/3294.gif","id":"3294","name":"archer push up","target":"pectorals"},{"bodyPart":"waist","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/2355.gif","id":"2355","name":"arm slingers hanging bent knee legs","target":"abs"},{"bodyPart":"waist","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/2333.gif","id":"2333","name":"arm slingers hanging straight legs","target":"abs"},{"bodyPart":"upper legs","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/3214.gif","id":"3214","name":"arms apart circular toe touch (male)","target":"glutes"},{"bodyPart":"waist","equipment":"body weight","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/3204.gif","id":"3204","name":"arms overhead full sit-up (male)","target":"abs"},{"bodyPart":"chest","equipment":"leverage machine","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0009.gif","id":"0009","name":"assisted chest dip (kneeling)","target":"pectorals"},{"bodyPart":"waist","equipment":"assisted","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0011.gif","id":"0011","name":"assisted hanging knee raise","target":"abs"},{"bodyPart":"waist","equipment":"assisted","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0010.gif","id":"0010","name":"assisted hanging knee raise with throw down","target":"abs"},{"bodyPart":"lower legs","equipment":"assisted","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/1708.gif","id":"1708","name":"assisted lying calves stretch","target":"calves"},{"bodyPart":"upper legs","equipment":"assisted","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/1709.gif","id":"1709","name":"assisted lying glutes stretch","target":"glutes"},{"bodyPart":"upper legs","equipment":"assisted","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/1710.gif","id":"1710","name":"assisted lying gluteus and piriformis stretch","target":"glutes"},{"bodyPart":"waist","equipment":"assisted","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0012.gif","id":"0012","name":"assisted lying leg raise with lateral throw down","target":"abs"},{"bodyPart":"waist","equipment":"assisted","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0013.gif","id":"0013","name":"assisted lying leg raise with throw down","target":"abs"},{"bodyPart":"waist","equipment":"medicine ball","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0014.gif","id":"0014","name":"assisted motion russian twist","target":"abs"},{"bodyPart":"back","equipment":"leverage machine","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0015.gif","id":"0015","name":"assisted parallel close grip pull-up","target":"lats"},{"bodyPart":"upper legs","equipment":"assisted","gifUrl":"http://d205bpvrqc9yn1.cloudfront.net/0016.gif","id":"0016","name":"assisted prone hamstring","target":"hamstrings"}]';
    $file = file_get_contents("db/ExerciceJson.txt");
    $json = json_decode($file,true);

    foreach($json as $value){
        $name = $value['name'];
        $img = $value['gifUrl'];
        $cat= $value['target'];
      
     $idr= $crud->addJsonCategorieAndExercice($name,$img,$cat);


     echo "<br>". $idr;



    }











?>