<?php 
session_start();
$logged = false;

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}

$logged_json = $logged ? 'true' : 'false';
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebToonCNU</title>

    <!-- Bootstrap (kept for NavBar compatibility) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome (kept for NavBar compatibility) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=DM+Sans:ital,opsz,wght@0,9..40,300;0,9..40,400;0,9..40,500;1,9..40,300&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <style>
        :root {
            --ink: #0f0e0d;
            --cream: #f5f0e8;
            --red: #e8a020;
            --red: #c0392b;
            --white: #ffffff;
        }

        #webtoon-hero *, #webtoon-hero *::before, #webtoon-hero *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        #webtoon-hero {
            font-family: 'DM Sans', sans-serif;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* ── BACKGROUND LAYERS ── */
        .wt-bg {
            position: absolute;
            inset: 0;
            z-index: 0;
        }

        /* Actual collage image — left half */
        .wt-bg-img {
            position: absolute;
            inset: 0;
            background: url('img/background1.png') center / auto 100% no-repeat;
        }

        /* Dark ink wash overlay so text stays readable */
        .wt-bg-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(
                105deg,
                rgba(10, 9, 8, 0.72) 0%,
                rgba(10, 9, 8, 0.55) 38%,
                rgba(10, 9, 8, 0.15) 65%,
                rgba(10, 9, 8, 0.0)  100%
            );
        }

        /* Halftone dots for comic feel */
        .wt-bg-dots {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(255,255,255,0.04) 1px, transparent 1px);
            background-size: 18px 18px;
        }

        /* Ink panel lines (vertical) */
        .wt-bg-lines {
            position: absolute;
            inset: 0;
            background-image:
                repeating-linear-gradient(90deg, transparent, transparent 79px, rgba(255,255,255,0.03) 79px, rgba(255,255,255,0.03) 80px),
                repeating-linear-gradient(0deg,  transparent, transparent 79px, rgba(255,255,255,0.03) 79px, rgba(255,255,255,0.03) 80px);
        }

        /* ── CONTENT ── */
        .wt-inner {
            position: relative;
            z-index: 2;
            flex: 1;
            display: flex;
            align-items: center;
            max-width: 1300px;
            width: 100%;
            margin: 0 auto;
            padding: 80px 48px 80px 56px;
            gap: 48px;
        }

        /* ── LEFT: text card ── */
        .wt-card {
            flex: 0 0 auto;
            width: min(480px, 100%);
            background: rgba(10, 9, 8, 0.78);
            border: 3px solid var(--white);
            box-shadow: 8px 8px 0 rgba(255,255,255,0.15), 0 0 0 1px rgba(255,255,255,0.05);
            padding: 40px 40px 36px;
            backdrop-filter: blur(2px);
        }

        .wt-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: var(--red);
            color: var(--ink);
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            padding: 5px 12px;
            margin-bottom: 20px;
            animation: wt-up 0.5s ease 0.05s both;
        }

        .wt-tag-dot {
            width: 5px; height: 5px;
            background: var(--ink);
            border-radius: 50%;
            display: inline-block;
        }

        .wt-title {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(64px, 8vw, 108px);
            line-height: 0.9;
            color: var(--white);
            letter-spacing: 0.02em;
            animation: wt-up 0.5s ease 0.15s both;
        }

        .wt-title-accent {
            color: var(--red);
            position: relative;
            display: inline-block;
        }

        .wt-title-accent::after {
            content: '';
            position: absolute;
            bottom: 3px; left: 0; right: 0;
            height: 5px;
            background: var(--red);
        }

        .wt-divider {
            height: 3px;
            background: linear-gradient(90deg, var(--red), transparent);
            margin: 20px 0;
            animation: wt-up 0.5s ease 0.2s both;
        }

        .wt-subtitle {
            animation: wt-up 0.5s ease 0.25s both;
        }

        .wt-subtitle p {
            font-size: 15px;
            font-weight: 300;
            color: rgba(255,255,255,0.82);
            line-height: 1.65;
        }

        .wt-subtitle p + p { margin-top: 4px; }

        .wt-actions {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 28px;
            animation: wt-up 0.5s ease 0.35s both;
        }

        .wt-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: 'DM Sans', sans-serif;
            font-size: 13px;
            font-weight: 500;
            padding: 11px 20px;
            border: 2px solid;
            text-decoration: none;
            letter-spacing: 0.03em;
            transition: transform 0.12s, box-shadow 0.12s, background 0.12s;
            white-space: nowrap;
        }

        .wt-btn:hover { transform: translate(-2px,-2px); text-decoration: none; }
        .wt-btn:active { transform: translate(1px,1px); }

        .wt-btn-red {
            background: var(--red);
            color: var(--ink);
            border-color: var(--red);
            box-shadow: 5px 5px 0 rgba(232,160,32,0.35);
        }
        .wt-btn-red:hover { box-shadow: 7px 7px 0 rgba(232,160,32,0.4); color: var(--ink); }

        .wt-btn-outline {
            background: transparent;
            color: var(--white);
            border-color: rgba(255,255,255,0.5);
            box-shadow: 5px 5px 0 rgba(255,255,255,0.08);
        }
        .wt-btn-outline:hover { background: rgba(255,255,255,0.08); box-shadow: 7px 7px 0 rgba(255,255,255,0.12); color: var(--white); }

        /* ── RIGHT: floating comic panels ── */
        .wt-panels {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 16px;
            animation: wt-in 0.6s ease 0.3s both;
            align-self: stretch;
            justify-content: center;
        }

        .wt-speech-row {
            display: flex;
            gap: 14px;
            align-items: flex-end;
        }

        .wt-speech {
            background: var(--white);
            border: 2.5px solid var(--ink);
            padding: 10px 16px;
            font-family: 'Bebas Neue', sans-serif;
            font-size: 15px;
            letter-spacing: 0.06em;
            color: var(--ink);
            position: relative;
            box-shadow: 4px 4px 0 rgba(0,0,0,0.4);
        }

        /* Tail pointing left */
        .wt-speech::before {
            content: '';
            position: absolute;
            bottom: -10px; left: 18px;
            border-left: 10px solid transparent;
            border-right: 0 solid transparent;
            border-top: 10px solid var(--ink);
        }
        .wt-speech::after {
            content: '';
            position: absolute;
            bottom: -7px; left: 20px;
            border-left: 8px solid transparent;
            border-right: 0 solid transparent;
            border-top: 8px solid var(--white);
        }

        /* Tail pointing right */
        .wt-speech-r::before {
            left: auto; right: 18px;
            border-left: 0;
            border-right: 10px solid transparent;
            border-top: 10px solid var(--ink);
        }
        .wt-speech-r::after {
            left: auto; right: 20px;
            border-left: 0;
            border-right: 8px solid transparent;
            border-top: 8px solid var(--white);
        }

        .wt-stat-row {
            display: flex;
            gap: 12px;
        }

        .wt-stat {
            background: rgba(10,9,8,0.75);
            border: 2px solid rgba(255,255,255,0.25);
            padding: 14px 20px;
            text-align: center;
            backdrop-filter: blur(4px);
            flex: 1;
        }

        .wt-stat-num {
            font-family: 'Bebas Neue', sans-serif;
            font-size: 36px;
            color: var(--red);
            line-height: 1;
        }

        .wt-stat-lbl {
            font-size: 10px;
            font-weight: 500;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.55);
            margin-top: 3px;
        }

        .wt-sfx {
            font-family: 'Bebas Neue', sans-serif;
            font-size: clamp(48px, 7vw, 90px);
            color: transparent;
            -webkit-text-stroke: 2px rgba(255,255,255,0.18);
            letter-spacing: 0.04em;
            line-height: 1;
            user-select: none;
            text-align: right;
        }

        /* ── BOTTOM BAR ── */
        .wt-bottom {
            position: relative;
            z-index: 2;
            background: rgba(5,4,4,0.9);
            border-top: 2px solid rgba(255,255,255,0.12);
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            padding: 12px 48px;
        }

        .wt-bar-item {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 10px;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: rgba(255,255,255,0.5);
        }

        .wt-bar-dot {
            width: 5px; height: 5px;
            background: var(--red);
            border-radius: 50%;
            flex-shrink: 0;
        }

        @keyframes wt-up {
            from { opacity: 0; transform: translateY(24px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes wt-in {
            from { opacity: 0; transform: translateX(30px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        /* Floating animation for speech bubbles */
        @keyframes wt-float {
            0%, 100% { transform: translateY(0); }
            50%       { transform: translateY(-6px); }
        }

        .wt-speech { animation: wt-float 4s ease-in-out infinite; }
        .wt-speech-r { animation: wt-float 4s ease-in-out 1.2s infinite; }

        @media (max-width: 900px) {
            .wt-inner { flex-direction: column; padding: 48px 24px 40px; gap: 32px; }
            .wt-card { width: 100%; }
            .wt-panels { display: none; }
            .wt-bottom { padding: 12px 24px; }
            .wt-bg-img { background-size: cover; background-position: center; }
        }
    </style>
</head>
<body>

<?php include 'inc/NavBar.php'; ?>

<div id="webtoon-hero-root"></div>

<script src="https://cdn.jsdelivr.net/npm/react@18/umd/react.production.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/react-dom@18/umd/react-dom.production.min.js"></script>

<script>
(function () {
    var e = React.createElement;
    var isLogged = <?= $logged_json ?>;

    function HeroApp() {
        var btns = [];

        if (!isLogged) {
            btns.push(e('a', { key: 'reg', href: 'signup.php', className: 'wt-btn wt-btn-outline' },
                e('i', { className: 'fa fa-user-plus', 'aria-hidden': 'true' }),
                ' \u00CEnregistrare'
            ));
        }

        btns.push(e('a', { key: 'cat', href: 'category.php', className: 'wt-btn wt-btn-outline' },
            e('i', { className: 'fa fa-th-large', 'aria-hidden': 'true' }),
            ' Categorii'
        ));

        btns.push(e('a', { key: 'form', href: 'form-1.php', className: 'wt-btn wt-btn-red' },
            e('i', { className: 'fa fa-pencil', 'aria-hidden': 'true' }),
            ' \u00CEnscriere 2025\u20132026'
        ));

        return e('section', { id: 'webtoon-hero', 'aria-label': 'WebToon CNU' },

            // Background layers
            e('div', { className: 'wt-bg' },
                e('div', { className: 'wt-bg-img' }),
                e('div', { className: 'wt-bg-overlay' }),
                e('div', { className: 'wt-bg-dots' }),
                e('div', { className: 'wt-bg-lines' })
            ),

            // Main content
            e('div', { className: 'wt-inner' },

                // LEFT: text card
                e('div', { className: 'wt-card' },
                    e('div', { className: 'wt-tag' },
                        e('span', { className: 'wt-tag-dot' }),
                        'Concurs oficial CEX Vrancea && Colegiul Na\u021Bional "Unirea" 2025\u20132026'
                    ),
                    e('h1', { className: 'wt-title' },
                        'Web', e('br', null),
                        'Toon', e('br', null),
                        e('span', { className: 'wt-title-accent' }, 'CNU')
                    ),
                    e('div', { className: 'wt-divider' }),
                    e('div', { className: 'wt-subtitle' },
                        e('p', null, 'Platforma oficial\u0103 a concursului de benzi desenate \u0219i webtoonuri.'),
                        e('p', null, 'Locul \u00EEn care tehnologia se \u00EEnt\u00E2lne\u0219te cu creativitatea.')
                    ),
                    e('div', { className: 'wt-actions' }, btns)
                ),

                // RIGHT: decorative comic elements overlaid on the background
                e('div', { className: 'wt-panels' },

                    e('div', { className: 'wt-sfx' }, 'CNU!'),

                    e('div', { className: 'wt-speech-row' },
                        e('div', { className: 'wt-speech' }, 'Desenez, deci exist!'),
                        null
                    ),

                    e('div', { className: 'wt-stat-row' },
                        e('div', { className: 'wt-stat' },
                            e('div', { className: 'wt-stat-num' }, '3+'),
                            e('div', { className: 'wt-stat-lbl' }, 'Edi\u021Bii')
                        ),
                        e('div', { className: 'wt-stat' },
                            e('div', { className: 'wt-stat-num' }, '100+'),
                            e('div', { className: 'wt-stat-lbl' }, 'Lucr\u0103ri')
                        ),
                        e('div', { className: 'wt-stat' },
                            e('div', { className: 'wt-stat-num' }, '\u221E'),
                            e('div', { className: 'wt-stat-lbl' }, 'Creativitate')
                        )
                    ),

                    e('div', { style: { display: 'flex', justifyContent: 'flex-end' } },
                        e('div', { className: 'wt-speech wt-speech-r' }, 'Urm\u0103toarea capodoper\u0103? A ta!')
                    )
                )
            ),

            // Bottom bar
            e('div', { className: 'wt-bottom' },
                e('div', { className: 'wt-bar-item' }, e('div', { className: 'wt-bar-dot' }), 'Colegiul Na\u021Bional Unirea'),
                e('div', { className: 'wt-bar-item' }, e('div', { className: 'wt-bar-dot' }), 'Platform\u0103 creat\u0103 de St\u0103nciulescu Bogdan'),
                e('div', { className: 'wt-bar-item' }, e('div', { className: 'wt-bar-dot' }), 'Benzi Desenate \u00B7 Webtoonuri'),
                e('div', { className: 'wt-bar-item' }, e('div', { className: 'wt-bar-dot' }), 'Edi\u021Bia 2025\u20132026')
            )
        );
    }

    var root = ReactDOM.createRoot(document.getElementById('webtoon-hero-root'));
    root.render(e(HeroApp));
})();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
