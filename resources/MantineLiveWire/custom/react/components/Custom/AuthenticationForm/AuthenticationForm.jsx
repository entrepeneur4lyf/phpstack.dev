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
  Divider,
} from '@mantine/core';
import { IconBrandGoogle, IconBrandTwitter } from '@tabler/icons-react';
import { useComponent } from '@/hooks/useComponent';

export default function AuthenticationForm() {
  const { auth } = useComponent();

  return (
    <Container size={420} my={40}>
      <Title ta="center" className="font-semibold">
        {auth.title}
      </Title>

      <Text c="dimmed" size="sm" ta="center" mt={5}>
        {auth.subtitle}
      </Text>

      <Paper withBorder shadow="md" p={30} mt={30} radius="md">
        <Group grow mb="md" mt="md">
          <Button
            leftSection={<IconBrandGoogle size={20} />}
            variant="default"
            radius="xl"
          >
            Google
          </Button>
          <Button
            leftSection={<IconBrandTwitter size={20} />}
            variant="default"
            radius="xl"
          >
            Twitter
          </Button>
        </Group>

        <Divider label="Or continue with email" labelPosition="center" my="lg" />

        <form>
          <TextInput
            label="Email"
            placeholder="you@email.com"
            required
            radius="md"
          />
          <PasswordInput
            label="Password"
            placeholder="Your password"
            required
            mt="md"
            radius="md"
          />

          <Group justify="space-between" mt="lg">
            <Checkbox label="Remember me" />
            <Anchor component="button" size="sm">
              Forgot password?
            </Anchor>
          </Group>

          <Button fullWidth mt="xl" radius="xl" className="bg-blue-600 hover:bg-blue-700">
            Login
          </Button>
        </form>

        <Text ta="center" mt="md">
          Don&apos;t have an account?{' '}
          <Anchor component="button" size="sm">
            Register
          </Anchor>
        </Text>
      </Paper>
    </Container>
  );
}
