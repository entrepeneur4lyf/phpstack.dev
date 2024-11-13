import axios from 'axios';
import { notifications } from '@mantine/notifications';
import { modals } from '@mantine/modals';

// Configure axios
window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// Add response interceptor for error handling
axios.interceptors.response.use(
    response => response,
    error => {
        if (error.response?.status === 419) {
            // CSRF token mismatch, refresh the page
            window.location.reload();
        } else if (error.response?.status === 401) {
            // Unauthorized, redirect to login
            window.location.href = '/login';
        } else {
            // Show error notification
            notifications.show({
                title: 'Error',
                message: error.response?.data?.message || 'An error occurred',
                color: 'red'
            });
        }
        return Promise.reject(error);
    }
);

// Global success notification helper
window.showSuccess = (message) => {
    notifications.show({
        title: 'Success',
        message,
        color: 'green'
    });
};

// Global error notification helper
window.showError = (message) => {
    notifications.show({
        title: 'Error',
        message,
        color: 'red'
    });
};

// Global confirmation modal helper
window.confirm = (title, message, onConfirm) => {
    modals.openConfirmModal({
        title,
        children: message,
        labels: { confirm: 'Confirm', cancel: 'Cancel' },
        confirmProps: { color: 'red' },
        onConfirm
    });
};

// Initialize Livewire hooks
document.addEventListener('livewire:init', () => {
    // Show notifications for Livewire flash messages
    Livewire.hook('request', ({ component }) => {
        const flash = component.data.flash || {};
        
        if (flash.success) {
            showSuccess(flash.success);
        }
        
        if (flash.error) {
            showError(flash.error);
        }
    });

    // Handle loading states
    Livewire.hook('request', ({ component }) => {
        // Add loading overlay to component
        component.el.style.position = 'relative';
        const loader = document.createElement('div');
        loader.className = 'mantine-overlay';
        component.el.appendChild(loader);

        return () => {
            // Remove loading overlay
            loader.remove();
        };
    });
});
