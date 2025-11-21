<?php
/**
 * Template Name: Contact Thank You
 * Template Post Type: page
 */

wp_enqueue_style(
    'bootstrap-5-landing',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css',
    [],
    '5.3.3'
);
wp_enqueue_script(
    'bootstrap-5-landing',
    'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',
    [],
    '5.3.3',
    true
);

$theme_dir = get_template_directory_uri();
$booking_page = get_page_by_path('booking');
$booking_url = $booking_page ? get_permalink($booking_page) : home_url('/booking');

get_header();
?>

<style>
    :root {
        --bs-border-radius: 4px;
        --bs-border-radius-sm: 4px;
        --bs-border-radius-lg: 4px;
        --bs-border-radius-xl: 4px;
        --bs-border-radius-xxl: 4px;
        --bs-border-radius-pill: 4px;
    }

    .rounded-circle {
        border-radius: 4px !important;
    }

    .booking-ambient {
        background:
            radial-gradient(circle at 20% 20%, rgba(96, 165, 250, 0.08), transparent 45%),
            radial-gradient(circle at 80% 0%, rgba(167, 139, 250, 0.08), transparent 35%),
            radial-gradient(circle at 50% 80%, rgba(16, 185, 129, 0.08), transparent 40%);
    }

    .thank-hero {
        background: linear-gradient(135deg, #1877F2 50%, #000000 50%);
        border-radius: 4px;
        color: #ffffff;
        overflow: hidden;
        position: relative;
        box-shadow: 0 15px 30px rgba(15, 23, 42, 0.12);
    }

    .thank-hero__inner {
        padding: clamp(24px, 4vw, 40px);
    }

    .thank-hero__badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 8px 12px;
        border-radius: 4px;
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        font-weight: 600;
        letter-spacing: 0.01em;
    }

    .thank-hero__badge svg {
        width: 20px;
        height: 20px;
        stroke: currentColor;
    }

    .thank-hero__title {
        font-size: clamp(2rem, 1.2rem + 2vw, 3.2rem);
        margin-bottom: 12px;
    }

    .thank-hero__text {
        max-width: 680px;
        color: rgba(255, 255, 255, 0.9);
        font-size: 1.05rem;
    }

    .thank-cta {
        gap: 12px;
    }

    .thank-cta .btn {
        padding-inline: 22px;
        border-radius: 4px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15);
    }

    .feature-icon-box {
        width: 56px;
        height: 56px;
        border-radius: 4px;
        background: linear-gradient(135deg, #f9fafb, #eef2f7);
        border: 1px solid #e2e8f0;
        box-shadow: 0 10px 25px rgba(15, 23, 42, 0.08);
    }

    .thank-next-card {
        background: #ffffff;
        border: 1px solid #e5e7eb;
        border-radius: 4px;
        box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
        height: 100%;
    }

    .thank-next-card__icon {
        width: 48px;
        height: 48px;
        border-radius: 4px;
        background: linear-gradient(135deg, #f9fafb, #eef2f7);
        border: 1px solid #e2e8f0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
    }

    .thank-next-card__icon svg {
        width: 24px;
        height: 24px;
        stroke: #0f172a;
    }
</style>

<div class="booking-ambient py-5 py-lg-6">
    <div class="container">
        <div class="row g-4 align-items-start">
            <div class="col-lg-7">
                <div class="thank-hero h-100">
                    <div class="thank-hero__inner d-flex flex-column gap-3">
                        <div class="thank-hero__badge">
                            <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M12 3 3 7l9 4 9-4-9-4ZM3 17l9 4 9-4M3 12l9 4 9-4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span><?php esc_html_e('Thanks for reaching out!', 'rap'); ?></span>
                        </div>
                        <h1 class="thank-hero__title fw-bold mb-0"><?php esc_html_e('We received your message', 'rap'); ?></h1>
                        <p class="thank-hero__text mb-0">
                            <?php esc_html_e('Our team is reviewing your request and will get back to you shortly with the next steps. Keep an eye on your inbox for an update.', 'rap'); ?>
                        </p>
                        <div class="thank-cta d-flex flex-wrap align-items-center">
                            <a class="btn btn-light btn-lg fw-semibold" href="<?php echo esc_url($booking_url); ?>">
                                <?php esc_html_e('Book an appointment', 'rap'); ?>
                            </a>
                            <span class="text-white-50 small ms-1"><?php esc_html_e('Schedule now to secure a time that works best for you.', 'rap'); ?></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="d-flex flex-column h-100 gap-3">
                    <div class="d-flex align-items-center gap-2">
                        <div class="feature-icon-box d-inline-flex align-items-center justify-content-center">
                            <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="m9 12.75 2 2 4-4.5M12 3 3 7v10l9 4 9-4V7l-9-4Z" stroke="#0f172a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div>
                            <p class="text-uppercase text-muted small mb-0 fw-semibold"><?php esc_html_e('What happens next?', 'rap'); ?></p>
                            <h3 class="h5 mb-0 fw-bold"><?php esc_html_e('Your request is on our radar', 'rap'); ?></h3>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <div class="thank-next-card p-3 p-lg-4">
                                <div class="thank-next-card__icon">
                                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M12 9V4.5M12 9l5-5M12 9l-5-5M6.75 15l-2.25 3M17.25 15l2.25 3M9 20l3-8 3 8M4 19.5h16" stroke="#0f172a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <h4 class="h6 fw-bold mb-2"><?php esc_html_e('We confirm your details', 'rap'); ?></h4>
                                <p class="mb-0 text-secondary">
                                    <?php esc_html_e('A specialist reviews your request to understand your goals, timeline, and any links or examples you shared.', 'rap'); ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="thank-next-card p-3 p-lg-4">
                                <div class="thank-next-card__icon">
                                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M3 8.5c0-2 1.792-3.5 4-3.5h10c2.208 0 4 1.5 4 3.5v7c0 2-1.792 3.5-4 3.5H7c-2.208 0-4-1.5-4-3.5v-7Zm12.5 5.167L19 16.5m-7-4.833L5 16.5" stroke="#0f172a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                                <h4 class="h6 fw-bold mb-2"><?php esc_html_e('We follow up quickly', 'rap'); ?></h4>
                                <p class="mb-0 text-secondary">
                                    <?php esc_html_e('Expect a reply from us with clarifying questions or next steps so we can keep your project moving.', 'rap'); ?>
                                </p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="thank-next-card p-3 p-lg-4">
                                <div class="thank-next-card__icon">
                                    <svg fill="none" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path d="M8.5 6h-2A1.5 1.5 0 0 0 5 7.5v9A1.5 1.5 0 0 0 6.5 18h11A1.5 1.5 0 0 0 19 16.5v-9A1.5 1.5 0 0 0 17.5 6h-2l-.879-1.757A1 1 0 0 0 13.723 4h-3.446a1 1 0 0 0-.898.243L8.5 6Z" stroke="#0f172a" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M8 10.5h2.5m3 0H16M8 13.5h4.5" stroke="#0f172a" stroke-width="1.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <h4 class="h6 fw-bold mb-2"><?php esc_html_e('You can also book now', 'rap'); ?></h4>
                                <p class="mb-3 text-secondary">
                                    <?php esc_html_e('Choose a time on our calendar and we will come prepared with recommendations tailored to your needs.', 'rap'); ?>
                                </p>
                                <a class="btn btn-dark fw-semibold" href="<?php echo esc_url($booking_url); ?>">
                                    <?php esc_html_e('Book an appointment', 'rap'); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
