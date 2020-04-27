            <footer>
                <div class="media-box">
                    <a href=""><span class="icon-facebook2"></span></a>
                    <a href=""><span class="icon-instagram"></span></a>
                    <a href=""><span class="icon-twitter"></span></a>
                </div>
                <div class="rights-box">
                    Derechas Reservados johnGomezDev.com&COPY; 2020 
                </div>
            </footer>

            <script>
            
                let menuBtn = document.getElementById('toggleNavBtn');
                let nav = document.getElementById('nav');

                menuBtn.addEventListener('click', () => {
                    let display = getComputedStyle(nav).display;

                    nav.style.display = display == 'block' ? 'none' : 'block';
                });

                let sessionBtns = document.querySelectorAll('.session-btn');
                let sessionBox = document.getElementById('session-box');

                sessionBtns.forEach((btn) => {
                    btn.addEventListener('click', () => {
                        sessionBox.style.display = 'flex';
                        nav.style.display = 'none';
                    });
                });

             </script>

        </div>
    </body>
</html>
