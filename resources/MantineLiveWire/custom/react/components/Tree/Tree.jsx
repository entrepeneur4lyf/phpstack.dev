import React from 'react';
import { Tree as MantineTree, useTree } from '@mantine/core';

function Tree({ wire, mingleData, children }) {
    const {
        data,
        tree: externalTree,
        renderNode,
        levelOffset,
        expandOnClick,
        selectOnClick,
        clearSelectionOnOutsideClick,
        classNames,
        styles,
    } = mingleData;

    // Create internal tree state if no external tree is provided
    const internalTree = useTree({
        initialExpandedState: {},
        initialSelectedState: [],
        initialCheckedState: [],
    });

    const tree = externalTree || internalTree;

    // Handle node rendering with Livewire integration
    const handleRenderNode = (payload) => {
        if (renderNode) {
            // Convert the renderNode function string into an actual function
            const renderFn = new Function('payload', `return ${renderNode}`);
            return renderFn({ 
                ...payload,
                tree: {
                    ...payload.tree,
                    // Wrap tree methods to emit events to Livewire
                    toggleExpanded: (value) => {
                        payload.tree.toggleExpanded(value);
                        wire.emit('nodeToggled', value);
                    },
                    toggleSelected: (value) => {
                        payload.tree.toggleSelected(value);
                        wire.emit('nodeSelected', value);
                    },
                    checkNode: (value) => {
                        payload.tree.checkNode(value);
                        wire.emit('nodeChecked', value);
                    },
                    uncheckNode: (value) => {
                        payload.tree.uncheckNode(value);
                        wire.emit('nodeUnchecked', value);
                    },
                }
            });
        }
        return null;
    };

    return (
        <MantineTree
            data={data}
            tree={tree}
            renderNode={handleRenderNode}
            levelOffset={levelOffset}
            expandOnClick={expandOnClick}
            selectOnClick={selectOnClick}
            clearSelectionOnOutsideClick={clearSelectionOnOutsideClick}
            classNames={classNames}
            styles={styles}
        >
            {children}
        </MantineTree>
    );
}

export default Tree;
