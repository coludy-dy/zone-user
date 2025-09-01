<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Toast Test</title>
    <style>
        #toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast {
            display: flex;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 15px 20px;
            margin-bottom: 10px;
            border-radius: 4px;
            min-width: 250px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            opacity: 0;
            transform: translateX(100%);
            animation: slideIn 0.5s forwards, fadeOut 0.5s ease-in-out 4s forwards;
        }

        .toast.success { background-color: #28a745; }
        .toast.error { background-color: #dc3545; }

        @keyframes slideIn {
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes fadeOut {
            to {
                opacity: 0;
                transform: translateX(100%);
            }
        }
    </style>
</head>
<body>

    <h1>Hello, Toast Test</h1>

    <div id="toast-container"></div>

    <script>
        function showToast(type, message) {
            const container = document.getElementById('toast-container');
            if (!container) {
                console.error('#toast-container not found!');
                return;
            }

            const toast = document.createElement('div');
            toast.classList.add('toast', type);
            toast.textContent = message;

            container.appendChild(toast);

            setTimeout(() => {
                toast.remove();
            }, 5000);
        }

        document.addEventListener('DOMContentLoaded', function () {
            @if(session('success'))
                showToast('success', @json(session('success')));
            @elseif(session('error'))
                showToast('error', @json(session('error')));
            @endif
        });
    </script>

</body>
</html>
