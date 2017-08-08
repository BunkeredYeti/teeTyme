<!DOCTYPE html> 
<html lang = "en">
 
   <head> 
      <meta charset = "utf-8"> 
      <title>Students Example</title> 
   </head> 
   <body> 
         <?php 
            echo form_open('Stud_controller/add_student');
            echo form_label('Roll No.'); 
            echo form_input(array('id'=>'roll_no','name'=>'roll_no')); 
            echo "<br/>"; 
			
            echo form_label('Name'); 
            echo form_input(array('id'=>'name','name'=>'name')); 
            echo "<br/>"; 
			
			echo form_label('Phone'); 
            echo form_input(array('id'=>'phone','name'=>'phone')); 
            echo "<br/>";
			
			echo form_label('email'); 
            echo form_input(array('id'=>'email','name'=>'email')); 
            echo "<br/>";
			
            echo form_submit(array('id'=>'submit','value'=>'Add')); 
            echo form_close(); 
         ?> 
   </body>
</html>