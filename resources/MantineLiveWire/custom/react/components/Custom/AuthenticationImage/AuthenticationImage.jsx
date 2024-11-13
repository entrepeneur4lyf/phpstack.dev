import React from 'react';
import {
  Paper,
  TextInput,
  PasswordInput,
  Checkbox,
  Button,
  Title,
  Text,
  Anchor,
  Container,
} from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function AuthenticationImage() {
  const { auth } = useComponent();

  return (
    <div 
      className="min-h-screen bg-cover bg-center relative"
      style={{ backgroundImage: `url(${auth.backgroundImage})` }}
    >
      <div className="absolute inset-0 bg-black/60" />

      <Container size={420} className="min-h-screen relative">
        <div className="flex flex-col justify-center min-h-screen">
          <Title ta="center" className="text-white">
            {auth.title}
          </Title>

          <Paper withBorder shadow="md" p={30} mt={30} radius="md">
            <TextInput 
              label="Email address" 
              placeholder="hello@example.com" 
              required 
            />
            <PasswordInput
              label="Password"
              placeholder="Your password"
              required
              mt="md"
            />
            <Group justify="space-between" mt="lg">
              <Checkbox label="Keep me logged in" />
              <Anchor component="button" size="sm">
                Forgot password?
              </Anchor>
            </Group>
            <Button fullWidth mt="xl" className="bg-blue-600 hover:bg-blue-700">
              Login
            </Button>

            <Text ta="center" mt="md">
              Don&apos;t have an account?{' '}
              <Anchor component="button" size="sm">
                Register
              </Anchor>
            </Text>
          </Paper>
        </div>
      </Container>
    </div>
  );
}
