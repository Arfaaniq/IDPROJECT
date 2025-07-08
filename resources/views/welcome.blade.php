<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link
            rel="shortcut icon"
            href="{{ asset('assets/Asset 1.png') }}"
            type="image/png"
        />
        <title>Splash Screen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body,
            html {
                height: 100%;
                background-color: #2e2f3c;
                font-family: Arial, sans-serif;
                overflow: hidden;
            }

            .splash-container {
                width: 100%;
                height: 100%;
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .logo {
                width: 150px;
                height: auto;
                position: absolute;
                z-index: 10;
            }

            .text-container {
                position: absolute;
                text-align: left;
                color: white;
                opacity: 0;
            }

            .text-container p:first-child {
                font-size: 64px;
                font-weight: bold;
                letter-spacing: 2px;
                margin-bottom: 5px;
                line-height: 1;
            }

            .text-container p:last-child {
                font-size: 23px;
                font-weight: 500;
                letter-spacing: 4.5px;
                word-spacing: 8px;
            }
        </style>
    </head>
    <body>
        <div class="splash-container">
            <img
                src="/images/logoidproject.png"
                alt="Logo"
                class="logo"
                id="logo"
            />
            <div class="text-container" id="text">
                <p>PROJECT</p>
                <p>ONE STOP SERVICE</p>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
        <script>
            const logo = document.getElementById("logo");
            const text = document.getElementById("text");

            // Initial position - logo and text both centered
            gsap.set(logo, { scale: 0, x: 0, opacity: 0 });
            gsap.set(text, { opacity: 0, x: 60 }); // Text positioned to the right of where logo will be

            const tl = gsap.timeline();

            // Step 1: Logo appears with zoom-in effect
            tl.to(logo, {
                duration: 1.2,
                scale: 1,
                opacity: 1,
                ease: "back.out(1.7)",
            })

                // Step 2: Logo moves left to make space for text
                .to(logo, {
                    duration: 0.8,
                    x: -200,
                    ease: "power2.inOut",
                })

                // Step 3: Text fades in (in place)
                .to(
                    text,
                    {
                        duration: 1,
                        opacity: 1,
                        ease: "power2.out",
                    },
                    "-=0.4"
                )

                // Step 4: Hold for a moment
                .to(
                    {},
                    {
                        duration: 1.5,
                    }
                )

                // Step 5: Text fades out (in place)
                .to(text, {
                    duration: 0.8,
                    opacity: 0,
                    ease: "power2.in",
                })

                // Step 6: Logo returns to center
                .to(
                    logo,
                    {
                        duration: 0.8,
                        x: 0,
                        ease: "power2.inOut",
                    },
                    "-=0.4"
                )

                // Step 7: Logo disappears with zoom-out effect
                .to(logo, {
                    duration: 1,
                    scale: 0,
                    opacity: 0,
                    ease: "back.in(1.7)",
                    delay: 0.3,
                })

                .to(
                    {},
                    {
                        duration: 0,
                        onComplete: () => {
                            window.location.href = "/home"; // Pastikan route /home aktif
                        },
                    }
                );
        </script>
    </body>
</html>
