<!-- begin:: Content Head -->
<div class="kt-subheader  kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            <button type="button" class="btn btn-label-danger btn-bold btn-sm btn-icon-h" id="hapus">Hapus</button>

        </div>
    </div>
</div>
<!-- end:: Content Head -->

<div class="kt-container  kt-container--fluid ">
    <div class="kt-portlet kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Pesan</h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="row" id="pesan_div">
                <?php foreach ($pesan as $row) : ?>

                <div class="col-md-6">
                    <div class="kt-notification">
                        <div class="kt-section__content" data-toggle="kt-popover" title="Isi Pesan" data-content="<?php echo $row['isi'] ?>">

                            <a href="#" class="kt-notification__item">
                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid py-0 my-0">
                                    <input type="checkbox" class="kt-checkable" value="<?php echo $row['id'] ?>">
                                    <span></span>
                                </label>

                                <div class="kt-notification__item-icon">
                                    <i class="flaticon-multimedia-2"></i>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div class="kt-notification__item-title">
                                        <?php $pe_ = isset($row['tentang']) ? $row['tentang'] : $row['email'] ?>
                                        <?php echo strtoupper($row['nama']) ?>
                                    </div>
                                    <div class="kt-notification__item-time">
                                        <?php echo $pe_ ?>
                                    </div>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>

    
</div>

<?php echo $js ?>

