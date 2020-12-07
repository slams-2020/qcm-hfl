<?php
return array("#tableName"=>"qcm","#primaryKeys"=>array("id"=>"id"),"#manyToOne"=>array("exam","user"),"#fieldNames"=>array("id"=>"id","name"=>"name","description"=>"description","cdate"=>"cdate","status"=>"status","exam"=>"idExam","useranswers"=>"useranswers","user"=>"idUser","questions"=>"questions"),"#memberNames"=>array("id"=>"id","name"=>"name","description"=>"description","cdate"=>"cdate","status"=>"status","idExam"=>"exam","useranswers"=>"useranswers","idUser"=>"user","questions"=>"questions"),"#fieldTypes"=>array("id"=>"int(11)","name"=>"varchar(42)","description"=>"varchar(42)","cdate"=>"datetime","status"=>"varchar(10)","exam"=>false,"useranswers"=>"mixed","user"=>false,"questions"=>"mixed"),"#nullable"=>array("name","description","cdate","status"),"#notSerializable"=>array("exam","useranswers","user","questions"),"#transformers"=>array("transform"=>array("cdate"=>"Ubiquity\\contents\\transformation\\transformers\\DateTime"),"toView"=>array("cdate"=>"Ubiquity\\contents\\transformation\\transformers\\DateTime"),"toForm"=>array("cdate"=>"Ubiquity\\contents\\transformation\\transformers\\DateTime")),"#accessors"=>array("id"=>"setId","name"=>"setName","description"=>"setDescription","cdate"=>"setCdate","status"=>"setStatus","idExam"=>"setExam","useranswers"=>"setUseranswers","idUser"=>"setUser","questions"=>"setQuestions"),"#oneToMany"=>array("useranswers"=>array("mappedBy"=>"qcm","className"=>"models\\Useranswer")),"#manyToMany"=>array("questions"=>array("targetEntity"=>"models\\Question","inversedBy"=>"qcms")),"#joinTable"=>array("questions"=>array("name"=>"qcmquestion")),"#joinColumn"=>array("exam"=>array("className"=>"models\\Exam","name"=>"idExam","nullable"=>false),"user"=>array("className"=>"models\\User","name"=>"idUser","nullable"=>false)),"#invertedJoinColumn"=>array("idExam"=>array("member"=>"exam","className"=>"models\\Exam"),"idUser"=>array("member"=>"user","className"=>"models\\User")));