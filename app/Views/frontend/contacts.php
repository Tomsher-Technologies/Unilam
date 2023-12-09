  <?= $this->include('frontend/common/header') ?>

        <div id="content" class="site-content">
            <div class="page-header dtable text-center header-transparent service-1" style="background-image: url( <?= isset($contactDetails) ? base_url() . '/' . $contactDetails['bannerImageUrl'] : '' ?>);">
                <div class="dcell">
                    <div class="container">
                        <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                            <h1 class="page-title"><?= $contactDetails['bannerTitle'] ?></h1>
                        <?php endif; ?>
                        <ul id="breadcrumbs" class="breadcrumbs none-style">
                            <li><a href="<?=base_url('home')?>">Home</a></li>
                            <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                                <li class="active"><?= $contactDetails['bannerTitle'] ?></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <section class="contact-page">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center mb-5 mb-lg-0">
                        <div class="contact-left">
                            <?php if (isset($_SESSION['successMessage']) && !empty($_SESSION['successMessage'])) : ?>
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>Success</strong> - <?= $_SESSION['successMessage']; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <h2>Get in Touch</h2>
                            <p class="font14">Your email address will not be published. Required fields are marked *</p>
                            <form id="ajax-form" name="ajax-form" action="contact" method="post" class="wpcf7">
                                <div class="main-form">
                                    <p>
                                        <label for="name"> <span class="error" id="err-name">please enter name</span></label>
                                        <input type="text" name="contactName" value="<?= isset($post['contactName']) ? $post['contactName'] : '' ?>" size="40" class="" aria-invalid="false" placeholder="Your Name *" required>
                                        <?php if (isset($validation) && isset($validation['contactName'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contactName']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </p>
                                    <p>
                                        <label for="email">
                                            <span class="error" id="err-email">please enter e-mail</span>
                                            <span class="error" id="err-emailvld">e-mail is not a valid format</span>
                                        </label>
                                        <input type="email" name="contactEmail" id="contactEmail" value="<?= isset($post['contactEmail']) ? $post['contactEmail'] : '' ?>" size="40" class="" aria-invalid="false" placeholder="Your Email *" required>
                                        <?php if (isset($validation) && isset($validation['contactEmail'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contactEmail']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </p>
                                    <p>
                                        <label for="name"> <span class="error" id="err-contactPhone">please enter phone</span></label>
                                        <input type="number" name="contactPhone" value="<?= isset($post['contactPhone']) ? $post['contactPhone'] : '' ?>" size="40" class="" aria-invalid="false" placeholder="Your Phone *" required>
                                        <?php if (isset($validation) && isset($validation['contactPhone'])) : ?>
                                            <small class="text-danger">
                                                <?= esc($validation['contactPhone']) ?>
                                            </small>
                                        <?php endif; ?>
                                    </p>
                                    <p>
                                        <label for="message"></label>
                                        <textarea name="message" value="<?= isset($post['message']) ? $post['message'] : '' ?>" id="message" cols="40" rows="10" class="" aria-invalid="false" placeholder="Message..." required></textarea>
                                    </p>
                                    <p><button type="submit" id="send" class="octf-btn">Send Message</button></p>
                                    <div class="clear"></div>
                                    <div class="error" id="err-form">There was a problem validating the form please
                                        check!</div>
                                    <div class="error" id="err-timedout">The connection to the server timed out!</div>
                                    <div class="error" id="err-state"></div>
                                </div>
                            </form>

                            <div class="clear"></div>
                            <div id="ajaxsuccess">Successfully sent!!</div>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="contact-right">
                            <?php if (isset($contactDetails) && !empty($contactDetails)) : ?>
                                <div class="ot-heading">
                                    <span>[ our contact details ]</span>
                                    <h2 class="main-heading"><?= $contactDetails['contactTitle'] ?></h2>
                                </div>
                                <p><?= $contactDetails['contactDescription'] ?></p>
                                <div class="contact-info">
                                    <i class="ot-flaticon-place"></i>
                                    <div class="info-text">
                                        <h6>OUR ADDRESS:</h6>
                                        <p><?= $contactDetails['address'] . ',&nbsp;&nbsp;' . $contactDetails['zipcode'] ?></p>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <i class="ot-flaticon-mail"></i>
                                    <div class="info-text">
                                        <h6>OUR MAILBOX:</h6>
                                        <p><a href="mailto:info@unilam.ae"><?= $contactDetails['email'] ?></a></p>
                                    </div>
                                </div>
                                <div class="contact-info">
                                    <i class="ot-flaticon-phone-call"></i>
                                    <div class="info-text">
                                        <h6>OUR PHONE:</h6>
                                        <p>
                                            <a href="tel:+971 <?= $contactDetails['phone'] ?>">
                                                +971;&nbsp;<?= $contactDetails['phone'] ?>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                                <div class="list-social">
                                    <ul>
                                        <li><a href="<?= $contactDetails['faceBookLink'] ?>" target="_self"><i class="fab fa-facebook-f"></i></a></li>
                                        <li><a href="<?= $contactDetails['twitterLink'] ?>" target="_self"><i class="fab fa-twitter"></i></a>
                                        </li>
                                        <li><a href="<?= $contactDetails['linkedInLink'] ?>" target="_self"><i class="fab fa-linkedin-in"></i></a></li>
                                        <li><a href="<?= $contactDetails['instagramLink'] ?>" target="_self"><i class="fab fa-instagram"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="contact-map">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d28930.411792530886!2d55.101761!3d24.98987!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e5f13938ae7901f%3A0x6a477486d9cc59d4!2sUnilam%20Wood%20Industries!5e0!3m2!1sen!2sus!4v1699972819321!5m2!1sen!2sus" height="522" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
  <?= $this->include('frontend/common/footer') ?>
