
<div class="user-profile-wrap shadow-reset">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
                <div class="col-lg-3">
                    <div class="user-profile-img">
                        <?php if($mhs['photo'] == 'default.jpg'){ ?>
                    		<img style="width: 100px;" src="<?php echo base_url('assets/images/default.jpg'); ?>">
                    	<?php }else{ ?>
                        	<img style="width: 100px;" src="<?php echo base_url('assets/images/uploads/'.$mhs['photo']); ?>">
                        <?php } ?>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="user-profile-content">
                        <h2><?php echo $mhs['nama_mhs']; ?> </h2>
                        <p class="profile-founder"><strong><?php echo $mhs['nim']; ?></strong>
                        </p>
                        <table class="table small m-b-xs">
			                <tbody>
			                    <tr>
			                        <td style="width: 130px;">
			                            <strong>Nama Ayah</strong> 
			                        </td>
			                        <td style="width: 3px;"><strong>:</strong></td>
			                        <td style="width: 110px; text-align: left;">
			                            <strong><?php echo $mhs['nama_ayah']; ?></strong>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td style="width: 130px;">
			                            <strong>Nama Ibu</strong> 
			                        </td>
			                        <td style="width: 3px;"><strong>:</strong></td>
			                        <td style="width: 110px; text-align: left;">
			                            <strong><?php echo $mhs['nama_ibu']; ?></strong>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td style="width: 130px;">
			                            <strong>No. Telepon</strong> 
			                        </td>
			                        <td style="width: 3px;"><strong>:</strong></td>
			                        <td style="width: 10px; text-align: left;">
			                            <strong><?php echo $mhs['hp_ortu']; ?></strong>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td style="width: 130px;">
			                            <strong>Alamat</strong> 
			                        </td>
			                        <td style="width: 3px;"><strong>:</strong></td>
			                        <td style="width: 300px; text-align: left;">
			                            <strong><?php echo $mhs['alamat_ortu']; ?></strong>
			                        </td>

			                    </tr>
			                </tbody>
			            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>