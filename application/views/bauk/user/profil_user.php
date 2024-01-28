<div class="user-profile-wrap shadow-reset">
    <div class="row">
        <div class="col-lg-6">
            <div class="row">
           
                
                <div class="col-lg-9">
                    <div class="user-profile-content">
                        <h2><?php echo $users['username']; ?></h2>
                        <table class="table small m-b-xs">
			                <tbody>
			                    <tr>
			                        <td style="width: 130px;">
			                            <strong>Username</strong> 
			                        </td>
			                        <td style="width: 3px;"><strong>:</strong></td>
			                        <td style="width: 110px; text-align: left;">
			                            <strong><?php echo $users['username']; ?></strong>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td style="width: 130px;">
			                            <strong>Email</strong> 
			                        </td>
			                        <td style="width: 3px;"><strong>:</strong></td>
			                        <td style="width: 110px; text-align: left;">
			                            <strong><?php echo $users['email'];?></strong>
			                        </td>
			                    </tr>
			                    <tr>
			                        <td style="width: 130px;">
			                            <strong>Password</strong> 
			                        </td>
			                        <td style="width: 3px;"><strong>:</strong></td>
			                        <td style="width: 10px; text-align: left;">
			                            <strong><?php echo $users['password']; ?></strong>
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





