import React from 'react';
import {
  TextInput,
  PasswordInput,
  Checkbox,
  Anchor,
  Paper,
  Title,
  Text,
  Container,
  Group,
  Button,
} from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function AuthenticationTitle() {
  const { auth } = useComponent();

  return (
    <Container size={420} my={40}>
      <Title ta="center" className="text-3xl font-bold">
        {auth.title}
      </Title>
      <Text c="dimmed" size="sm" ta="center" mt={5}>
        {auth.subtitle}{' '}
        <Anchor size="sm" component="button">
          {auth.subtitleLink}
        </Anchor>
      </Text>

      <Paper withBorder shadow="md" p={30} mt={30} radius="md">
        <TextInput label="Email" placeholder="you@email.com" required />
        <PasswordInput label="Password" placeholder="Your password" required mt="md" />
        <Group justify="space-between" mt="lg">
          <Checkbox label="Remember me" />
          <Anchor component="button" size="sm">
            Forgot password?
          </Anchor>
        </Group>
        <Button fullWidth mt="xl" className="bg-blue-600 hover:bg-blue-700">
          Sign in
        </Button>
      </Paper>
    </Container>
  );
}
