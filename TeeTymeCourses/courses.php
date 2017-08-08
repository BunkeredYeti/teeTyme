<?php
    require_once("database.php");
    require_once("table.php");
    
    class courses implements Table {
        // DATA MEMBERS
        private $id;
        private $name;
        private $nameErr;
        private $email;
        private $emailErr;
        private $phone;
        private $phoneErr;
		private $description;
		private $descriptionErr;
		private $address;
		private $addressErr;
		private $city;
		private $cityErr;
		private $state;
		private $stateErr;
		private $zip;
		private $zipErr;
		private $parErr;
		private $par01;
		private $par02;
		private $par03;
		private $par04;
		private $par05;
		private $par06;
		private $par07;
		private $par08;
		private $par09;
		private $par10;
		private $par11;
		private $par12;
		private $par13;
		private $par14;
		private $par15;
		private $par16;
		private $par17;
		private $par18;
   
        // CONSTRUCTOR
        function __construct($id, $name, $email, $phone, $description, $address, $city, $state, $zip, $par01, $par02, $par03, $par04, $par05, $par06, $par07, $par08, $par09, $par10, $par11, $par12, $par13, $par14, $par15, $par16, $par17, $par18) {
            $this->id     = $id;
            $this->name   = $name;
            $this->email  = $email;
            $this->phone  = $phone;
			$this->description = $description;
			$this->address     = $address;
			$this->city        = $city;
			$this->state  = $state;
			$this->zip    = $zip;
			$this->par01  = $par01;
			$this->par02  = $par02;
			$this->par03  = $par03;
			$this->par04  = $par04;
			$this->par05  = $par05;
			$this->par06  = $par06;
			$this->par07  = $par07;
			$this->par08  = $par08;
			$this->par09  = $par09;
			$this->par10  = $par10;
			$this->par11  = $par11;
			$this->par12  = $par12;
			$this->par13  = $par13;
			$this->par14  = $par14;
			$this->par15  = $par15;
			$this->par16  = $par16;
			$this->par17  = $par17;
			$this->par18  = $par18;
			
			
        }
    
        // Display a table containing details about every record in the database.
        public function displayListScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Courses</h3>
                        </div>
                        <div class='row'>
                            <a class='btn btn-primary' onclick='coursesRequest(\"displayCreate\")'>Add Course</a>
							<a href='../register/home.php'>Back</a>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
										<th>Description</th>
										<th>Address</th>
										<th>City</th>
										<th>State</th>
										<th>Zip</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";                                    
            foreach (Database::prepare('SELECT * FROM `tt_courses`', array()) as $row) {
                echo "
                    <tr>
                        <td>{$row['name']}  </td>
                        <td>{$row['email']} </td>
                        <td>{$row['phone']} </td>
						<td>{$row['description']}</td>
						<td>{$row['address']}    </td>
						<td>{$row['city']}  </td>
						<td>{$row['state']} </td>
						<td>{$row['zip']}   </td>
						
						
                        <td>
                            <button class='btn' onclick='coursesRequest(\"displayRead\", {$row['id']})'>Read</button><br>
                            <button class='btn btn-success' onclick='coursesRequest(\"displayUpdate\", {$row['id']})'>Update</button><br>
                            <button class='btn btn-danger' onclick='coursesRequest(\"displayDelete\", {$row['id']})'>Delete</button>
                        </td>
                    </tr>";
            }
            echo "</tbody></table></div></div></div>";
        }
        
        // Display a form for adding a record to the database.
        public function displayCreateScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Create courses</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->nameErr))?'':' error') ."'>name</label>
                                <div class='controls'>
                                    <input id='name' type='text' placeholder='TeeTyme' required>
                                    <span class='help-inline'>{$this->nameErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->emailErr))?'':' error') ."'>email</label>
                                <div class='controls'>
                                    <input id='email' type='text' placeholder='name@svsu.edu' required>
                                    <span class='help-inline'>{$this->emailErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->phoneErr))?'':' error') ."'>phone</label>
                                <div class='controls'>
                                    <input id='phone' type='text' placeholder='555-5555-555' required>
                                    <span class='help-inline'>{$this->phoneErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->descriptionErr))?'':' error') ."'>description</label>
                                <div class='controls'>
                                    <input id='description' type='text' placeholder='description' required>
                                    <span class='help-inline'>{$this->descriptionErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->addressErr))?'':' error') ."'>address</label>
                                <div class='controls'>
                                    <input id='address' type='text' placeholder='address' required>
                                    <span class='help-inline'>{$this->addressErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->cityErr))?'':' error') ."'>city</label>
                                <div class='controls'>
                                    <input id='city' type='text' placeholder='city' required>
                                    <span class='help-inline'>{$this->cityErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->stateErr))?'':' error') ."'>state</label>
                                <div class='controls'>
                                    <input id='state' type='text' placeholder='state' required>
                                    <span class='help-inline'>{$this->stateErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->zipErr))?'':' error') ."'>zip</label>
                                <div class='controls'>
                                    <input id='zip' type='text' placeholder='48708' required>
                                    <span class='help-inline'>{$this->zipErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 1</label>
                                <div class='controls'>
                                    <input id='par01' type='text' placeholder='Par for #1' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 2</label>
                                <div class='controls'>
                                    <input id='par02' type='text' placeholder='par for #2' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 3</label>
                                <div class='controls'>
                                    <input id='par03' type='text' placeholder='par for #3' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 4</label>
                                <div class='controls'>
                                    <input id='par04' type='text' placeholder='par for #4' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 5</label>
                                <div class='controls'>
                                    <input id='par05' type='text' placeholder='par for #5' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 6</label>
                                <div class='controls'>
                                    <input id='par06' type='text' placeholder='par for #6' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 7</label>
                                <div class='controls'>
                                    <input id='par07' type='text' placeholder='par for #7' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 8</label>
                                <div class='controls'>
                                    <input id='par08' type='text' placeholder='par for #8' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 9</label>
                                <div class='controls'>
                                    <input id='par09' type='text' placeholder='par for #9' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 10</label>
                                <div class='controls'>
                                    <input id='par10' type='text' placeholder='Par for #10' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 11</label>
                                <div class='controls'>
                                    <input id='par11' type='text' placeholder='par for #11' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 12</label>
                                <div class='controls'>
                                    <input id='par12' type='text' placeholder='par for #12' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 13</label>
                                <div class='controls'>
                                    <input id='par13' type='text' placeholder='par for #13' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 14</label>
                                <div class='controls'>
                                    <input id='par14' type='text' placeholder='par for #14' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 15</label>
                                <div class='controls'>
                                    <input id='par15' type='text' placeholder='par for #15' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 16</label>
                                <div class='controls'>
                                    <input id='par16' type='text' placeholder='par for #16' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 17</label>
                                <div class='controls'>
                                    <input id='par17' type='text' placeholder='par for #17' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->parErr))?'':' error') ."'>hole 18</label>
                                <div class='controls'>
                                    <input id='par18' type='text' placeholder='par for #18' required>
                                    <span class='help-inline'>{$this->parErr}</span>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='coursesRequest(\"createRecord\")'>Create</button>
                                <a class='btn' onclick='coursesRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Adds a record to the database.
        public function createRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "INSERT INTO tt_courses (name, email, phone, description, address, city, state, zip, par01, par02, par03, par04, par05, par06, par07, par08, par09, par10, par11, par12, par13, par14, par15, par16, par17, par18) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)",
                    array($this->name, $this->email, $this->phone, $this->description, $this->address, $this->city, $this->state, $this->zip, $this->par01, $this->par02, $this->par03, $this->par04, $this->par05, $this->par06, $this->par07, $this->par08, $this->par09, $this->par10, $this->par11, $this->par12, $this->par13, $this->par14, $this->par15, $this->par16, $this->par17, $this->par18)
                );
                $this->displayListScreen();
            } else {
                $this->displayCreateScreen();
            }
        }
        
        // Display a form containing information about a specified record in the database.
        public function displayReadScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_courses WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Course Contact Information</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label'>name</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['name']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>email</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['email']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>phone</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['phone']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>description</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['description']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>address</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['address']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>city</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['city']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>state</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['state']}
                                    </label>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label'>zip</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['zip']}
                                    </label>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <a class='btn' onclick='coursesRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Display a form for updating a record within the database.
        public function displayUpdateScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_courses WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Update Course Contact Information</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->nameErr))?'':' error') ."'>name</label>
                                <div class='controls'>
                                    <input id='name' type='text' value='{$rec['name']}' required>
                                    <span class='help-inline'>{$this->nameErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->emailErr))?'':' error') ."'>email</label>
                                <div class='controls'>
                                    <input id='email' type='text' value='{$rec['email']}' required>
                                    <span class='help-inline'>{$this->emailErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->phoneErr))?'':' error') ."'>phone</label>
                                <div class='controls'>
                                    <input id='phone' type='text' value='{$rec['phone']}' required>
                                    <span class='help-inline'>{$this->phoneErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->descriptionErr))?'':' error') ."'>description</label>
                                <div class='controls'>
									<input id='description' type='text' value='{$rec['description']}' required>
                                    <span class='help-inline'>{$this->descriptionErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->addressErr))?'':' error') ."'>address</label>
                                <div class='controls'>
                                    <input id='address' type='text' value='{$rec['address']}' required>
                                    <span class='help-inline'>{$this->addressErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->cityErr))?'':' error') ."'>city</label>
                                <div class='controls'>
                                    <input id='city' type='text' value='{$rec['city']}' required>
                                    <span class='help-inline'>{$this->cityErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->stateErr))?'':' error') ."'>state</label>
                                <div class='controls'>
                                    <input id='state' type='text' value='{$rec['state']}' required>
                                    <span class='help-inline'>{$this->addressErr}</span>
                                </div>
                            </div>
							<div class='control-group'>
                                <label class='control-label". ((empty($this->zipErr))?'':' error') ."'>zip</label>
                                <div class='controls'>
                                    <input id='zip' type='text' value='{$rec['zip']}' required>
                                    <span class='help-inline'>{$this->zipErr}</span>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='coursesRequest(\"updateRecord\", {$this->id})'>Update</button>
                                <a class='btn' onclick='coursesRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Updates a record within the database.
        public function updateRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "UPDATE tt_courses SET name = ?, email = ?, phone = ? , description = ?, address = ?, city = ?, state = ?, zip = ? WHERE id = ?",
                    array($this->name, $this->email, $this->phone, $this->description, $this-> address, $this-> city, $this-> state, $this-> zip, $this->id)
                );
                $this->displayListScreen();
            } else {
                $this->displayUpdateScreen();
            }
        }
        
        // Display a form for deleting a record from the database.
        public function displayDeleteScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Delete Person</h3>
                        </div>
                        <div class='form-horizontal'>
                            <p class='alert alert-error'>Are you sure you want to delete ?</p>
                            <div class='form-actions'>
                                <button id='submit' class='btn btn-danger' onClick='coursesRequest(\"deleteRecord\", {$this->id});'>Yes</button>
                                <a class='btn' onclick='coursesRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Removes a record from the database.
        public function deleteRecord() {
            Database::prepare(
                "DELETE FROM tt_courses WHERE id = ?",
                array($this->id)
            );
            $this->displayListScreen();
        }
        
        // Validates user input.
        private function validate() {
            $valid = true;
            // Validate phone
            if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $this->phone)) {
                $this->phoneErr = "Please enter a valid phone number.";
                $valid = false;
            }
            // Validate Email
            if (!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                $this->emailErr = "Please enter a valid email address.";
                $valid = false;
            }
            // Check for empty input.
            if (empty($this->name)) { 
                $this->nameErr = "Please enter a name.";
                $valid = false; 
            }
            if (empty($this->email)) { 
                $this->emailErr = "Please enter an email.";
                $valid = false; 
            }
            if (empty($this->phone)) { 
                $this->phoneErr = "Please enter a phone number.";
                $valid = false; 
            } print_r($valid);
			if (empty($this->par01)){
				$this->parErr = "Please enter a value for par.";
				$valid = false;
			}
            return $valid;
        }
    }
?>