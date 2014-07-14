<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class="lr-center lr-col-8">
    <table id="lr-admin-usermanager-users">
        <thead>
            <tr>
                <th><a class="k-button k-button-icontext" href="?module=Admin&view=UserManager&action=NewUser"><span class="k-icon k-add"></span>New</a></th>
                <th>Username</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Supervisor</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $connect= default_connection();
        req("SympolSelect");
        $slt=new SympolSelect($connect);
        $slt->select()->from("tbl_users")->all();
        while($slt->next() && $row = $slt->row) :
        ?>
            <tr>
                <td>
                    <span class="k-toolbar">
                        <a class="k-button k-button-icontext" href="?module=Admin&view=UserManager&action=EditUser&_id=<?php echo $row["_id"];?>">  <span class="k-icon k-edit"></span>Edit</a>
                    </span>
                </td>
                <td><?php echo $row["user_name"];?></td>
                <td><?php echo $row["first_name"];?></td>
                <td><?php echo $row["last_name"];?></td>
                <td><?php echo $row["super"];?></td>
                <td><?php echo $row["status"];?></td>
            </tr>
        <?php
        endwhile;
        ?>
        </tbody>
        <script>
            $('#lr-admin-usermanager-users').kendoGrid({ 
                        columns:[{
                            field:"actions",
                            groupable:false,
                            sortable:false,
                            filterable:false
                        },{
                            field:"user_name",
                            title: "Username",
                            groupable:true,
                            sortable:true,
                            filterable:true
                        },{
                            field:"first_name",
                            title: "First Name",
                            groupable:true,
                            sortable:true,
                            filterable:true
                        },{
                            field:"last_name",
                            title: "Last Name",
                            groupable:true,
                            sortable:true,
                            filterable:true
                        },{
                            field:"super",
                            title: "Supervisor",
                            groupable:true,
                            sortable:true,
                            filterable:true
                        },{
                            field:"status",
                            title: "Status",
                            groupable:true,
                            sortable:true,
                            filterable:true
                        }],
                        groupable: true,
                        sortable: true,
                        filterable: true,
                        pageable: {
                            pageSizes: true,
                            buttonCount: 5,
                            messages: {
                                display: ""
                            }
                        }});
        </script>

    </table>
</div>