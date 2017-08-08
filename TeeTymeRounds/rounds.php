<?php
    require_once("database.php");
    require_once("table.php");
    
    class Persons implements Table {
        // DATA MEMBERS
        private $id;
        private $teedate;
        private $teedateErr;
        private $teetime;
        private $teetimeErr;
        private $course_id;
        private $course_idErr;
        
        // CONSTRUCTOR
        function __construct($id, $teedate, $teetime, $course_id) {
            $this->id     = $id;
            $this->teedate   = $teedate;
            $this->teetime  = $teetime;
            $this->course_id = $course_id;
        }
    
        // Display a table containing details about every record in the database.
        public function displayListScreen() {
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Rounds</h3>
                        </div>
                        <div class='row'>
                            <a class='btn btn-primary' onclick='roundsRequest(\"displayCreate\")'>Add Round</a>
							<a href='../register/home.php'>Back</a>
                            <table class='table table-striped table-bordered' style='background-color: lightgrey !important'>
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Tee Time</th>
                                        <th>Course id</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>";                                    
            foreach (Database::prepare('SELECT * FROM `tt_rounds`', array()) as $row) {
                echo "
                    <tr>
                        <td>{$row['teedate']  }</td>
                        <td>{$row['teetime'] }</td>
                        <td>{$row['course_id']}</td>
                        <td>
                            <button class='btn' onclick='roundsRequest(\"displayRead\", {$row['id']})'>Read</button><br>
                            <button class='btn btn-success' onclick='roundsRequest(\"displayUpdate\", {$row['id']})'>Update</button><br>
                            <button class='btn btn-danger' onclick='roundsRequest(\"displayDelete\", {$row['id']})'>Delete</button>
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
                            <h3>Create Round</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->teedateErr))?'':' error') ."'>date</label>
                                <div class='controls'>
                                    <input id='teedate' type='text' placeholder='YYYY-MM-DD' required>
                                    <span class='help-inline'>{$this->dateErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->teetimeErr))?'':' error') ."'>time</label>
                                <div class='controls'>
                                    <input id='teetime' type='text' placeholder='HH:MM:SS' required>
                                    <span class='help-inline'>{$this->teetimeErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->course_idErr))?'':' error') ."'>course id</label>
                                <div class='controls'>
                                    <input id='course_id' type='text' required>
                                    <span class='help-inline'>{$this->course_idErr}</span>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='roundsRequest(\"createRecord\")'>Create</button>
                                <a class='btn' onclick='roundsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Adds a record to the database.
        public function createRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "INSERT INTO tt_rounds (teedate, teetime, course_id) VALUES (?,?,?)",
                    array($this->teedate, $this->teetime, $this->course_id)
                );
                $this->displayListScreen();
            } else {
                $this->displayCreateScreen();
            }
        }
        
        // Display a form containing information about a specified record in the database.
        public function displayReadScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_rounds WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Round Details</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label'>Date</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['teedate']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Tee Time</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['teetime']}
                                    </label>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label'>Course ID</label>
                                <div class='controls'>
                                    <label class='checkbox'>
                                        {$rec['course_id']}
                                    </label>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <a class='btn' onclick='roundsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Display a form for updating a record within the database.
        public function displayUpdateScreen() {
            $rec = Database::prepare(
                "SELECT * FROM tt_rounds WHERE id = ?", 
                array($this->id)
            )->fetch(PDO::FETCH_ASSOC);
            echo "
                <div class='container'>
                    <div class='span10 offset1'>
                        <div class='row'>
                            <h3>Update Round</h3>
                        </div>
                        <div class='form-horizontal'>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->teedateErr))?'':' error') ."'>date</label>
                                <div class='controls'>
                                    <input id='teedate' type='text' value='{$rec['teedate']}' required>
                                    <span class='help-inline'>{$this->dateErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->teetimeErr))?'':' error') ."'>tee time</label>
                                <div class='controls'>
                                    <input id='teetime' type='text' value='{$rec['teetime']}' required>
                                    <span class='help-inline'>{$this->teetimeErr}</span>
                                </div>
                            </div>
                            <div class='control-group'>
                                <label class='control-label". ((empty($this->mobileErr))?'':' error') ."'>course id</label>
                                <div class='controls'>
                                    <input id='course_id' type='text' value='{$rec['course_id']}' required>
                                    <span class='help-inline'>{$this->mobileErr}</span>
                                </div>
                            </div>
                            <div class='form-actions'>
                                <button class='btn btn-success' onclick='roundsRequest(\"updateRecord\", {$this->id})'>Update</button>
                                <a class='btn' onclick='roundsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Updates a record within the database.
        public function updateRecord() {
            if ($this->validate()) {
                Database::prepare(
                    "UPDATE tt_rounds SET teedate = ?, teetime = ?, course_id = ? WHERE id = ?",
                    array($this->teedate, $this->teetime, $this->course_id, $this->id)
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
                            <h3>Delete Round</h3>
                        </div>
                        <div class='form-horizontal'>
                            <p class='alert alert-error'>Are you sure you want to delete ?</p>
                            <div class='form-actions'>
                                <button id='submit' class='btn btn-danger' onClick='roundsRequest(\"deleteRecord\", {$this->id});'>Yes</button>
                                <a class='btn' onclick='roundsRequest(\"displayList\")'>Back</a>
                            </div>
                        </div>
                    </div>
                </div>";
        }
        
        // Removes a record from the database.
        public function deleteRecord() {
            Database::prepare(
                "DELETE FROM tt_rounds WHERE id = ?",
                array($this->id)
            );
            $this->displayListScreen();
        }
        
        // Validates user input.
        private function validate() {
            $valid = true;
            // Validate Mobile
            if (!preg_match("/^[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $this->mobile)) {
                $this->mobileErr = "Please enter a valid phone number.";
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
            if (empty($this->mobile)) { 
                $this->mobileErr = "Please enter a phone number.";
                $valid = false; 
            } print_r($valid);
            return $valid;
        }
    }
?>