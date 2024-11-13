import React from 'react';
import { Table, Avatar, Text, Group, Badge } from '@mantine/core';
import { useComponent } from '@/hooks/useComponent';

export default function UsersRolesTable() {
  const { users } = useComponent();

  const rows = users.map((user) => (
    <Table.Tr key={user.id}>
      <Table.Td>
        <Group gap="sm">
          <Avatar size={30} src={user.avatar} radius={30} />
          <div>
            <Text fz="sm" fw={500}>
              {user.name}
            </Text>
            <Text fz="xs" c="dimmed">
              {user.email}
            </Text>
          </div>
        </Group>
      </Table.Td>

      <Table.Td>
        <Badge variant="light">
          {user.role}
        </Badge>
      </Table.Td>

      <Table.Td>
        <Text fz="sm">
          {user.lastActive}
        </Text>
      </Table.Td>

      <Table.Td>
        <Badge 
          color={user.status === 'Active' ? 'blue' : 'gray'}
          variant="light"
        >
          {user.status}
        </Badge>
      </Table.Td>
    </Table.Tr>
  ));

  return (
    <Table verticalSpacing="sm">
      <Table.Thead>
        <Table.Tr>
          <Table.Th>Employee</Table.Th>
          <Table.Th>Role</Table.Th>
          <Table.Th>Last active</Table.Th>
          <Table.Th>Status</Table.Th>
        </Table.Tr>
      </Table.Thead>
      <Table.Tbody>{rows}</Table.Tbody>
    </Table>
  );
}
