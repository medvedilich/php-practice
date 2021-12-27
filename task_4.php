<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="utf-8">
        <title>
            Подготовительные задания к курсу
        </title>
        <meta name="description" content="Chartist.html">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no, minimal-ui">
        <link id="vendorsbundle" rel="stylesheet" media="screen, print" href="css/vendors.bundle.css">
        <link id="appbundle" rel="stylesheet" media="screen, print" href="css/app.bundle.css">
        <link id="myskin" rel="stylesheet" media="screen, print" href="css/skins/skin-master.css">
        <link rel="stylesheet" media="screen, print" href="css/statistics/chartist/chartist.css">
        <link rel="stylesheet" media="screen, print" href="css/miscellaneous/lightgallery/lightgallery.bundle.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-solid.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-brands.css">
        <link rel="stylesheet" media="screen, print" href="css/fa-regular.css">
    </head>
    <body class="mod-bg-1 mod-nav-link ">
        <main id="js-page-content" role="main" class="page-content">
            <div class="col-md-6">
                <div id="panel-1" class="panel">
                    <div class="panel-hdr">
                        <h2>
                            Задание
                        </h2>
                        <div class="panel-toolbar">
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                            <button class="btn btn-panel waves-effect waves-themed" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">






                            <?php
                                Class ProgressBar{
                                    public $name;
                                    public $value;
                                    public $limit;
                                    public $color;
                                    public $unit;
                                    public $show_limit;

                                    function Show(){
                                        $filling = $this->value / $this->limit * 100;
                                        ?>
                                            <div class="d-flex mt-2">
                                                <?= $this->name; ?>
                                                <span class="d-inline-block ml-auto">
                                                    <?= $this->value . ($this->show_limit ? ' / '.$this->limit : '') .' '. $this->unit;?>
                                                </span>
                                            </div>
                                            <div class="progress progress-sm mb-3">
                                                <div
                                                class="progress-bar"
                                                role="progressbar"
                                                style="width: <?=$filling?>%; background: <?=$this->color?>;"
                                                aria-valuenow="<?=$filling?>"
                                                aria-valuemin="0"
                                                aria-valuemax="100"></div>
                                            </div>
                                        <?php
                                    }

                                    function __construct($name, $value, $limit, $color, $unit='', $show_limit=false)
                                    {
                                        $this->name = $name;
                                        $this->value = $value;
                                        $this->limit = $limit;
                                        $this->color = $color;
                                        $this->unit = $unit;
                                        $this->show_limit = $show_limit;
                                    }
                                }

                                $progress_bars=[
                                    new ProgressBar('My Tasks', 130, 500, '#aaa555', '', true),
                                    new ProgressBar('Transfered', 440, 1000, '#345667', 'TB', true),
                                    new ProgressBar('Bugs Squashed', 77, 100, '#23546e', '%'),
                                    new ProgressBar('User Testing', 7, 10, '#ee4e7e', 'days')
                                ];

                                foreach($progress_bars as $item)
                                    $item->Show();
                            ?>






                        </div>
                    </div>
                </div>
            </div>
        </main>
        

        <script src="js/vendors.bundle.js"></script>
        <script src="js/app.bundle.js"></script>
        <script>
            // default list filter
            initApp.listFilter($('#js_default_list'), $('#js_default_list_filter'));
            // custom response message
            initApp.listFilter($('#js-list-msg'), $('#js-list-msg-filter'));
        </script>
    </body>
</html>
