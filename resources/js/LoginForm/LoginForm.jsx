import React from 'react'
import { useForm } from '@mantine/form'
import { TextInput, PasswordInput, Checkbox, Button, Group, Stack } from '@mantine/core'
import { notifications } from '@mantine/notifications'

function LoginForm({ wire, ...props }) {
    const form = useForm({
        initialValues: {
            email: '',
            password: '',
            remember: false
        },
        validate: {
            email: (value) => (/^\S+@\S+$/.test(value) ? null : 'Invalid email'),
            password: (value) => (value.length < 1 ? 'Password is required' : null)
        }
    })

    const handleSubmit = async (values) => {
        try {
            await wire.authenticate(values)
            
            notifications.show({
                title: 'Success',
                message: 'Successfully logged in',
                color: 'green'
            })
        } catch (error) {
            notifications.show({
                title: 'Error',
                message: error.message || 'Authentication failed',
                color: 'red'
            })

            // Update form errors from server validation
            if (error.errors) {
                form.setErrors(error.errors)
            }
        }
    }

    return (
        <form onSubmit={form.onSubmit(handleSubmit)}>
            <Stack>
                <TextInput
                    required
                    label="Email"
                    placeholder="your@email.com"
                    {...form.getInputProps('email')}
                />

                <PasswordInput
                    required
                    label="Password"
                    placeholder="Your password"
                    {...form.getInputProps('password')}
                />

                <Checkbox
                    label="Remember me"
                    {...form.getInputProps('remember', { type: 'checkbox' })}
                />

                <Group justify="space-between" mt="md">
                    {props.forgotPasswordLink && (
                        <a href={props.forgotPasswordLink} className="text-sm text-gray-600 hover:text-gray-900">
                            Forgot your password?
                        </a>
                    )}

                    <Button type="submit">
                        Log in
                    </Button>
                </Group>
            </Stack>
        </form>
    )
}

export default LoginForm
