<?php

function connect(){
	$link = mysqli_connect("localhost", "root", "", "educo");

	if(!$link){
		die("Could not connect to the database".mysqli_connect_error());
	}

	return($link);
}

function insert($sql){
	$link = connect();

	if(mysqli_query($link, $sql)){
		return "success";
	}else{
		return "Could not update".mysqli_error($link);
	}
}

 function getData($result){
                         $rows = array();

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $rows[] = $row;
                                }
                                return $rows;
                            }else{
                            	echo "No record found";
                            }
                        }


?>
