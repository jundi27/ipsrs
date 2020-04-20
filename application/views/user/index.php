<!-- content -->
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid">
            <h1 class="mt-4"><?= $title; ?></h1>

            <div class="row">
                <div class="col-lg-8 mt-5 ">
                    <?= $this->session->flashdata('pesan'); ?>
                </div>
            </div>

            <div class="card mb-3 col-lg-8">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $user['nama']; ?></h5>
                            <p class="card-text"><?= $user['email'] ?></p>
                            <p class="card-text"><small class="text-muted"><?= date('d F Y', $user['date_created']); ?></small></p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>