import React from 'react';
import { ModalsProvider as MantineModalsProvider, modals } from '@mantine/modals';

// Export modals for use in other components
export { modals };

function ModalsProvider({ wire, mingleData }) {
    const {
        modals: contextModals,
        modalProps,
        labels,
        classNames,
        styles,
        children,
    } = mingleData;

    // Set up Livewire event listeners for modal control
    React.useEffect(() => {
        wire.on('openConfirmModal', (options) => modals.openConfirmModal(options));
        wire.on('openContextModal', (options) => modals.openContextModal(options));
        wire.on('openModal', (options) => modals.open(options));
        wire.on('closeModal', (id) => modals.close(id));
        wire.on('closeAll', () => modals.closeAll());
    }, [wire]);

    return (
        <MantineModalsProvider
            modals={contextModals}
            modalProps={modalProps}
            labels={labels}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineModalsProvider>
    );
}

export default ModalsProvider;
