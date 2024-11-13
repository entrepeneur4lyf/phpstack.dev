import React from 'react';
import { Paper, Text, Group, Button } from '@mantine/core';
import classes from './ThemeDemo.module.css';

function ThemeDemo({ wire, mingleData }) {
    const { colorScheme, config } = mingleData;

    return (
        <Paper className={classes['color-scheme-aware-component']} p="md">
            <Text size="xl" mb="md">
                Theme System Demo
            </Text>

            <Group mb="md">
                <div className={classes['light-mode-element']}>
                    This is only visible in light mode
                </div>
                <div className={classes['dark-mode-element']}>
                    This is only visible in dark mode
                </div>
            </Group>

            <Group>
                <Button
                    className={classes.button}
                    data-size="xs"
                >
                    Extra Small
                </Button>
                <Button
                    className={classes.button}
                >
                    Default Size
                </Button>
                <Button
                    className={classes.button}
                    data-size="xl"
                >
                    Extra Large
                </Button>
            </Group>

            <div className={classes['color-scheme-transition']} style={{ marginTop: 20 }}>
                <Text>
                    Current color scheme: {colorScheme}
                    {config.keepTransitions ? ' (with transitions)' : ' (without transitions)'}
                </Text>
            </div>
        </Paper>
    );
}

export default ThemeDemo;
