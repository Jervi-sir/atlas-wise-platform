<body class=" {{ session('dark-theme') == 1 ? 'clock-body-dark' : 'clock-body' }}">
    <main>
        <section class="{{ session('dark-theme') == 1 ? 'clock-dark-container' : 'clock-container' }}">
            <div class="clock  {{ session('dark-theme') == 1 ? 'clock-dark' : 'clock-light' }}">
            <div class="needle hour"></div>
            <div class="needle minute"></div>
            <div class="needle seconds"></div>
            <div class="center"></div>
            </div>
        </section>
    </main>
</body>