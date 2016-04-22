<?php
/**
 * Created by PhpStorm.
 * User: v.ahmedjanov
 * Date: 21.04.2016
 * Time: 12:04
 */
?>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Страницы</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Url</th>
                        <th>Макет</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach ($items as $page):
                    ?>
                            <tr>
                                <td><?=$page['id']; ?> </td>
                                <td><?=$page['url']; ?> </td>
                                <td><?=$page['layout']; ?></td>
                                <td>
                                    <a class="btn btn-app" href="#">
                                        <i class="fa fa-clone"></i>
                                        Копировать
                                    </a>
                                    <a class="btn btn-app" href="/admin/index.php?p=page&id=<?=$page['id']; ?>">
                                        <i class="fa fa-edit"></i>
                                        Редактирование
                                    </a>
                                    <a class="btn btn-app" href="#">
                                        <i class="fa fa-eraser"></i>
                                        Удалить
                                    </a>
                                </td>
                            </tr>
                    <?php
                        endforeach;
                    ?>
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Url</th>
                        <th>Макет</th>
                        <th>Действия</th>
                    </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
