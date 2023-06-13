<?php
if(!defined('DirBlock')){
    die('Direct Access Not Permitted.');
}
?>
<div class="d-print-none">
					  <ul class="pagination">
									<li class="page-item">
										<a class="page-link" <?php if($paging > 1){ echo "href='?paging=$previous'"; } ?>><i class="fas fa-backward"></i></a>
									</li>
									<?php 
									for($x=1;$x<=$totalpaging;$x++){
										?> 
										<li class="page-item"><a class="page-link" href="?paging=<?php echo $x ?>"><?php echo $x; ?></a></li>
										<?php
									}
									?>				
									<li class="page-item">
										<a  class="page-link" <?php if($paging < $totalpaging) { echo "href='?paging=$next'"; } ?>><i class="fas fa-forward"></i></a>
									</li>
								</ul>
					</div>
        </div>
        <button class="btn btn-info btn-sm d-print-none" onclick="window.print()"><i class="fas fa-print"></i></button>
        </div>
    </body>
</html>