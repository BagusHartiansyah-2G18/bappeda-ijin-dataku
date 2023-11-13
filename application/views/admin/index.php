<div class="kt-container  kt-container--fluid ">
    <div class="row">
        <div class="col-md-6">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Pesan</h3>
                    </div>
                    
                    <div class="kt-portlet__head-toolbar">
                        <a href="<?php echo site_url('admin?pesan=all') ?>" class="btn btn-label-danger btn-bold btn-sm btn-icon-h">Lihat Semua</a>
                    </div>
                    
                </div>
                <div class="kt-portlet__body">
                    
                    <div class="kt-notification">
                        <?php foreach ($pesan as $row) : ?>
                        <div class="kt-section__content" data-toggle="kt-popover" title="Isi Pesan" data-content="<?php echo $row['isi'] ?>">

                            <a href="#" class="kt-notification__item">
                                <div class="kt-notification__item-icon"><i class="flaticon-multimedia-2"></i></div>
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
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Dewan Riset Terbaru</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-widget4">
                        <?php foreach ($peneliti as $row) : ?>
                        <div class="kt-widget4__item">
                            <div class="kt-widget4__pic kt-widget4__pic--pic">
                                <?php $row->photo = $row->photo ? $row->photo : 'default.jpg' ?>
                                <img src="<?php echo base_url('uploads/peneliti/'.$row->photo)?>">   
                            </div>
                            <div class="kt-widget4__info">
                                <a href="#" class="kt-widget4__username">
                                    <?php echo strtoupper($row->nama) ?>
                                </a>
                                <p class="kt-widget4__text">
                                    <?php $row->instansi =  explode('-', $row->instansi); ?>
                                    <?php echo $row->instansi[1] ?>

                                </p>                                     
                            </div>                       
                            <a href="<?php echo site_url('admin/dewan_riset?form='.$row->id_peneliti) ?>" class="btn btn-sm btn-label-brand btn-bold">Lihat</a>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Post Terbaru</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-notification">
                        <?php foreach ($post as $row) : ?>
                        <a href="<?php echo site_url('home/post/'.$row->id) ?>" target="_blank" class="kt-notification__item">
                            <div class="kt-notification__item-icon"><i class="flaticon-edit-1"></i></div>

                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    <?php echo ucwords(strtolower($row->judul)) ?>
                                </div>
                                <div class="kt-notification__item-time">
                                    <?php echo $row->tanggal ?>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-6">
            <div class="kt-portlet kt-portlet--height-fluid">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">Page Terbaru</h3>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    
                    <div class="kt-notification">
                        <?php foreach ($page as $row) : ?>
                        <a href="<?php echo site_url('home/post/'.$row->id) ?>" target="_blank" class="kt-notification__item">
                            <div class="kt-notification__item-icon"><i class="flaticon2-paper"></i></div>
                            <div class="kt-notification__item-details">
                                <div class="kt-notification__item-title">
                                    <?php echo ucwords(strtolower($row->judul)) ?>
                                </div>
                                <div class="kt-notification__item-time">
                                    <?php echo $row->tanggal ?>
                                </div>
                            </div>
                        </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<script type="text/javascript">
     $('body').removeClass('kt-subheader--enabled kt-subheader--fixed kt-subheader--solid');
</script>
