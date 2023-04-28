<!-- implement connection to database -->
<?php
$db = \Config\Database::connect();
$queryMenu = "SELECT *
                        FROM `user_menu` order by 3
                        ";
$query   = $db->query($queryMenu);
$results = $query->getResultArray();



$authorize = $auth = service('authorization');

?>

<div id="sidebar-menu" class="main_menu_side hidden-print main_menu hidden_nav">
    <div class="menu_section">
        <h3></h3>
        <ul class="nav side-menu">
            <!-- implement Looping Menu heading -->
            <li><a href="/"><i class="fa fa-home"></i>Dashboard</a></li>
            <?php foreach ($results as $m) : ?>


                <li class="parent_menu"><a><i class="<?= $m['icon']; ?>"></i> <?= $m['menu_title']; ?> <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">

                        <!-- implement sub menu categorize by menu -->
                        <?php
                        $menuIdDua = $m['id'];

                        $querySubMenuDua = "SELECT *
                                FROM `user_sub_menu` JOIN `user_menu`
                                ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                                WHERE `user_sub_menu`.`menu_id` = $menuIdDua
                                AND `user_sub_menu`.`is_active` = 1
                                ORDER BY user_sub_menu.sort_menu ASC ";
                        $queryDua   = $db->query($querySubMenuDua);
                        $subMenuDua = $queryDua->getResultArray();

                        ?>
                        <?php foreach ($subMenuDua as $smdua) : ?>
                            <?php if (has_permission($smdua['url'])) : ?>
                                <li class="child_menu_children"><a class="nav__item" style="cursor: pointer;" href="/<?= $smdua['url'] ?>"><?= $smdua['sub_title'] ?></a></li>
                        <?php
                            endif;
                        endforeach; ?>


                    </ul>
                </li>

            <?php endforeach; ?>
        </ul>
    </div>
</div>