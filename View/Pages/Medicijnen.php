<?php
include_once 'View/Components/Head.php';
include_once 'View/Components/Nav.php';
include_once("Model/Model.php");

$model = new Model\Model();
$medicijnen = $this->model->getMedicijnen();

echo '
    <div id="page-grid">
        <form id="side-nav" action="" method="POST">
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="home"><i class="fas fa-home"></i> Home</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="patienten"><i class="fas fa-address-card"></i> Patienten</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="apotheken"><i class="fas fa-clinic-medical"></i> Apotheken</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action active" name="medicijnen"><i class="fas fa-prescription-bottle-alt"></i> Medicijnen</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="recepten"><i class="fas fa-file-medical"></i> Recepten</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="contact"><i class="fas fa-envelope"></i> Contact</button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="log-uit" id="log-uit"><i class="fas fa-sign-out-alt"></i></button>
            <button type="submit" class="p-2 list-group-item list-group-item-action" name="med-page" id="add-med"><i class="fas fa-file-medical"></i> add-med</button>
        </form>

        <div id="content-medi" class="animate__animated animate__fadeIn"> 
            <table class="table table-striped">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Werking</th>
                    <th scope="col">Bijwerking</th>
                    <th scope="col">Prijs</th>
                    <th scope="col" style="text-align: center;">Delete</th>
                    <th scope="col" style="text-align: center;">Edit</th>
                    </tr>
                </thead>
            <tbody>
            ';

            foreach($medicijnen as $med){
                echo '
                <tr>
                    <th scope="row">'.$med->__get('id').'</th> 
                    <td>'.$med->__get('naam').'</td> 
                    <td>'.$med->__get('werking').'</td> 
                    <td>'.$med->__get('bijwerking').'</td> 
                    <td>€'.number_format($med->__get("prijs"), 2, ",", ".").'</td> 
                    <td> 
                        <form class="med-menu-buttons" method="POST" action=""> 
                            <input type="number" class="d-none" name="id" value="'.$med->__get('id').'"\>
                            <button type="submit" id="delete-med" name="delete-med"><i class="fas fa-trash-alt"></i></button>
                        </form> 
                    </td>
                    <td> 
                        <form class="med-menu-buttons" method="POST" action=""> 
                            <input type="number" class="d-none" name="id" value="'.$med->__get('id').'">
                            <button type="submit" id="edit-med" name="edit-med"><i class="fas fa-edit"></i></button>
                        </form> 
                    </td>
                </tr>';
            }
            
            echo '
            </tbody>
            </table>
        </div>
    </div>
    ';

include_once 'View/Components/Scripts.php';