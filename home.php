<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./LidaryFiles/bootstrap-5.3.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-2 mt-2 text-center">User Table</h2>
        <?php

        include "connection.php";

        $search_user = " SELECT * FROM `user` ";
        $result = $conn->query($search_user);

        ?>


        <table class="table table-light table-striped table-borderd">
            <thead>
                <tr class="text-center p-1" style="font-size: 20px;">
                    <th>#</th>
                    <th class="text-start">User Name</th>
                    <th class="text-start">Status</th>

                </tr>
            </thead>

            <tbody class="text-center" style="font-size: 16px;">

                <?php

                if ($result->num_rows > 0) {

                    for ($i = 0; $i < $result->num_rows; $i++) {
                        $data = $result->fetch_assoc();

                ?>
                        <tr>
                            <td><?php echo($i + 1)?></td>
                            <td class="text-start"> <?php echo($data['username']);?> </td>
                            <td class="text-start"><?php if($data['status']){
                                                        ?>
                                                            <span class="alert success-bg p-1">Active</span>
                                                        <?php
                                                            }else{
                                                                ?>
                                                                <span class="alert alert-bg p-1">Inactive</span>
                                                            <?php   
                                                            } ?>
                            </td>

                        </tr>

                <?php

                    }
                } else {
                    echo (" <tr> <td colspan='3'> Users Found.  </td> </tr> ");
                }


                ?>

            </tbody>

        </table>
    </div>
</body>

</html>