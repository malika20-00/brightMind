<div class="container" style="width: 100%;" id="<?php echo $comment['id'];?>">

<?php 
$etudiant=$prof->ecrivainComment($comment['id']);
?>
								<div class="media g-mb-30 media-comment">

									<div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
										<div class="g-mb-15">
											<h5 class="h5 g-color-gray-dark-v1 mb-0" style="color:#000;"><?php if($etudiant){echo $etudiant['prenom']." ".$etudiant['nom'];} else{ echo "moi" ;} ?></h5>
											<span class="g-color-gray-dark-v4 g-font-size-12">  <?php echo  $comment['date']; ?></span>
										</div>

										<p style="color:#212529;">
                                       <?php echo  $comment['contenu']; ?>
                                       </p>
                                       <?php 
                                if($comment['contenu']!='this message has been deleted'){
                                ?>
										<ul class="list-inline d-sm-flex my-0">
											<li class="list-inline-item g-mr-20">
                                            <a class="fa fa-edit" id="addAdminBtn" onclick="modifierComment(<?php	echo $comment['id']; ?>,'<?php	echo $comment['contenu']; ?>')" data-toggle="modal" data-target="#modifiercommentaire"></a>
											</li>
											<li class="list-inline-item g-mr-20">
												
                                            <a class="fa fa-trash" id="addAdminBtn" onclick="supprimerComment(<?php	echo $comment['id']; ?>)" data-toggle="modal" data-target="#deletecommentaire"></a>
											</li>
											<li class="list-inline-item ml-auto">
												<a class="u-link-v5 g-color-gray-dark-v4 g-color-primary--hover" onclick="replyComment(<?php	echo $comment['id']; ?>)" data-toggle="modal" data-target="#replycommentaire">
													<i class="fa fa-reply g-pos-rel g-top-1 g-mr-3"></i>
													Reply
												</a>
											</li>
										</ul>
                                        <?php } ?>
									</div>

								</div>
							</div>
                           

                            <?php
foreach($prof->comment_child($comment['id']) as $comment){ ?>  
 <div class="fils">
    <?php require("commentaire.php"); ?>
</div>
<?php }?>
<style>
.fils {
            margin-left: 20px;
           
        }
        .g-pa-30 {
    padding: 1rem !important;
}
        </style>