import React from 'react';
import { FileButton as MantineFileButton } from '@mantine/core';

function FileButton({ wire, mingleData, children }) {
    const {
        onChange,
        accept,
        multiple,
        resetRef,
        name,
        form,
        capture,
        disabled,
    } = mingleData;

    return (
        <MantineFileButton
            onChange={(files) => {
                if (onChange) {
                    // Convert FileList to Array for multiple files
                    const fileArray = multiple ? Array.from(files) : files;
                    
                    // Convert File objects to plain objects for wire transmission
                    const filesData = multiple
                        ? fileArray.map(file => ({
                            name: file.name,
                            size: file.size,
                            type: file.type,
                            lastModified: file.lastModified,
                        }))
                        : {
                            name: fileArray.name,
                            size: fileArray.size,
                            type: fileArray.type,
                            lastModified: fileArray.lastModified,
                        };
                    
                    wire.emit('change', filesData);
                }
            }}
            accept={accept}
            multiple={multiple}
            resetRef={resetRef}
            name={name}
            form={form}
            capture={capture}
            disabled={disabled}
        >
            {(props) => {
                // Convert the children function string into an actual function
                // that returns the JSX based on the input props
                const childrenFn = new Function('props', `return ${children}`);
                return childrenFn(props);
            }}
        </MantineFileButton>
    );
}

export default FileButton;
