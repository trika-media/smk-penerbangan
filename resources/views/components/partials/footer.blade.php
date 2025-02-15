<footer class="bg-dark p-5 text-white">
    <div class="mx-auto my-0 d-flex justify-content-between flex-wrap" style="max-width: 1200px;">
        <!-- Left Section -->
        <div style="flex: 1; min-width: 250px;">
            <h4 style="margin-bottom: 10px;">Smk Penerbangan Ea</h4>
            <p style="font-size: 14px;">Mottonya</p>
        </div>

        <!-- Middle Section (Links) -->
        <div style="flex: 1; min-width: 250px; text-align: center;">
            <h4 style="margin-bottom: 10px;">Kompentensi</h4>
            <ul style="list-style-type: none; padding: 0;">
                <li>
                    <a href="#" class="text-white text-decoration-none p-1 d-block">
                        RPL
                    </a>
                </li>
            </ul>
        </div>

        <!-- Right Section (Social Media) -->
        <div style="flex: 1; min-width: 250px; text-align: right;">
            <h4 style="margin-bottom: 10px;">Social Media Kami</h4>
            <div style="display: flex; gap: 15px; justify-content: flex-end;">
                <button class="btn btn-primary btn-icon">
                    <i class="bx bxl-facebook"></i>
                </button>
                <button class="btn btn-info btn-icon text-white">
                    <i class="bx bxl-twitter"></i>
                </button>
                <button class="btn text-white btn-icon" style="background: #A45D9E">
                    <i class="bx bxl-instagram"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div style="text-align: center; margin-top: 20px; font-size: 12px;">
        <p>&copy; {{ now()->format("Y") }} SMK Penerbangan EA. All Rights Reserved.</p>
    </div>
</footer>
