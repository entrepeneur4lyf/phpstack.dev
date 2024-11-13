import React from 'react';
import { Dropzone as MantineDropzone, MIME_TYPES } from '@mantine/dropzone';

// Export MIME_TYPES for use in other components
export { MIME_TYPES };

function Dropzone({ wire, mingleData }) {
    const {
        accept,
        maxSize,
        maxFiles,
        multiple,
        loading,
        disabled,
        openRef,
        activateOnClick,
        onDrop,
        onReject,
        onDragEnter,
        onDragLeave,
        onDragOver,
        onFileDialogOpen,
        onFileDialogCancel,
        active,
        radius,
        padding,
        classNames,
        styles,
        children,
    } = mingleData;

    // Add subcomponents as static properties
    Dropzone.Accept = MantineDropzone.Accept;
    Dropzone.Reject = MantineDropzone.Reject;
    Dropzone.Idle = MantineDropzone.Idle;
    Dropzone.FullScreen = MantineDropzone.FullScreen;

    return (
        <MantineDropzone
            accept={accept}
            maxSize={maxSize}
            maxFiles={maxFiles}
            multiple={multiple}
            loading={loading}
            disabled={disabled}
            openRef={openRef}
            activateOnClick={activateOnClick}
            onDrop={(files) => wire.emit('drop', files)}
            onReject={(files) => wire.emit('reject', files)}
            onDragEnter={onDragEnter}
            onDragLeave={onDragLeave}
            onDragOver={onDragOver}
            onFileDialogOpen={onFileDialogOpen}
            onFileDialogCancel={onFileDialogCancel}
            active={active}
            radius={radius}
            padding={padding}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineDropzone>
    );
}

// Add subcomponents as static properties
Dropzone.Accept = MantineDropzone.Accept;
Dropzone.Reject = MantineDropzone.Reject;
Dropzone.Idle = MantineDropzone.Idle;
Dropzone.FullScreen = MantineDropzone.FullScreen;

export default Dropzone;
