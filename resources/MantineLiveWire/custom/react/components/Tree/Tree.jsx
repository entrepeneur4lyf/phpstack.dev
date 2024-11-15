import React from 'react';
import { Tree as MantineTree, useTree } from '@mantine/core';
import { motion, AnimatePresence } from 'motion/react';
import { springs, presets, stagger } from '../../utils/animations';

// Motion-enhanced components
const MotionTree = motion(MantineTree);
const MotionNode = motion.div;
const MotionIcon = motion.div;

function Tree({ wire, mingleData, children }) {
    const {
        data,
        tree: externalTree,
        renderNode,
        levelOffset = 20,
        expandOnClick = true,
        selectOnClick = false,
        clearSelectionOnOutsideClick = true,
        classNames,
        styles,
        // Animation props
        animate = true,
    } = mingleData;

    // Create internal tree state if no external tree is provided
    const internalTree = useTree({
        initialExpandedState: {},
        initialSelectedState: [],
        initialCheckedState: [],
    });

    const tree = externalTree || internalTree;

    // Handle node rendering with animations
    const handleRenderNode = (payload) => {
        if (renderNode) {
            // Convert the renderNode function string into an actual function
            const renderFn = new Function('payload', `return ${renderNode}`);
            const node = renderFn({ 
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

            // Wrap node with animations
            return (
                <MotionNode
                    initial={{ opacity: 0, x: -20 }}
                    animate={{ opacity: 1, x: 0 }}
                    exit={{ opacity: 0, x: -20 }}
                    transition={{
                        ...springs.expand,
                        delay: payload.level * 0.1, // Stagger based on level
                    }}
                    style={{
                        marginLeft: `${payload.level * levelOffset}px`,
                    }}
                >
                    {/* Expand/collapse icon with rotation */}
                    {payload.hasChildren && (
                        <MotionIcon
                            animate={{ 
                                rotate: payload.isExpanded ? 90 : 0,
                            }}
                            transition={springs.expand}
                            style={{
                                display: 'inline-block',
                                marginRight: '8px',
                                cursor: 'pointer',
                            }}
                            onClick={() => payload.tree.toggleExpanded(payload.value)}
                        >
                            ▶
                        </MotionIcon>
                    )}

                    {/* Node content with selection effect */}
                    <motion.div
                        animate={payload.isSelected ? {
                            scale: [1, 1.05, 1],
                            transition: {
                                duration: presets.expand.duration * 0.5,
                            }
                        } : {}}
                        style={{
                            display: 'inline-block',
                            cursor: selectOnClick ? 'pointer' : 'default',
                        }}
                        onClick={selectOnClick ? 
                            () => payload.tree.toggleSelected(payload.value) : 
                            undefined}
                    >
                        {node}
                    </motion.div>

                    {/* Children container with expand/collapse animation */}
                    <AnimatePresence mode="wait">
                        {payload.isExpanded && payload.hasChildren && (
                            <motion.div
                                initial={{ height: 0, opacity: 0 }}
                                animate={{ 
                                    height: 'auto',
                                    opacity: 1,
                                }}
                                exit={{ 
                                    height: 0,
                                    opacity: 0,
                                }}
                                transition={springs.expand}
                                style={{ overflow: 'hidden' }}
                            >
                                {payload.children}
                            </motion.div>
                        )}
                    </AnimatePresence>
                </MotionNode>
            );
        }
        return null;
    };

    return (
        <AnimatePresence mode="wait">
            <MotionTree
                data={data}
                tree={tree}
                renderNode={handleRenderNode}
                levelOffset={0} // We handle offset in node render
                expandOnClick={expandOnClick}
                selectOnClick={selectOnClick}
                clearSelectionOnOutsideClick={clearSelectionOnOutsideClick}
                classNames={{
                    ...classNames,
                    root: `${classNames?.root || ''} ${animate ? 'animated-tree' : ''}`,
                }}
                styles={{
                    ...styles,
                    root: {
                        ...styles?.root,
                        overflow: 'hidden',
                    },
                }}
                initial={{ opacity: 0 }}
                animate={{ opacity: 1 }}
                exit={{ opacity: 0 }}
                transition={springs.expand}
            >
                {children}
            </MotionTree>
        </AnimatePresence>
    );
}

// Add variants for common use cases
Tree.Animated = function AnimatedTree(props) {
    return (
        <Tree
            {...props}
            mingleData={{
                ...props.mingleData,
                animate: true,
                expandOnClick: true,
            }}
        />
    );
};

Tree.Interactive = function InteractiveTree(props) {
    return (
        <Tree
            {...props}
            mingleData={{
                ...props.mingleData,
                animate: true,
                expandOnClick: true,
                selectOnClick: true,
            }}
        />
    );
};

Tree.Compact = function CompactTree(props) {
    return (
        <Tree
            {...props}
            mingleData={{
                ...props.mingleData,
                levelOffset: 12,
                animate: true,
            }}
        />
    );
};

export default Tree;
