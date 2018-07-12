<?php

/*
 * This file is part of the Moddus project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Security;

use AppBundle\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;

class UserVoter extends Voter
{
    const VIEW = 'view';
    const EDIT = 'edit';
    const DELETE = 'delete';
    const CREATE = 'create';

    /**
     * Determines if the attribute and subject are supported by this voter.
     *
     * @param string $attribute An attribute
     * @param mixed  $subject   The subject to secure, e.g. an object the user wants to access or any other PHP type
     *
     * @return bool True if the attribute and subject are supported, false otherwise
     */
    protected function supports($attribute, $subject)
    {
        if (!in_array($attribute, [self::CREATE, self::DELETE, self::EDIT, self::VIEW], true)) {
            return false;
        }

        if (!($subject instanceof User)) {
            return false;
        }

        return true;
    }

    /**
     * Perform a single access check operation on a given attribute, subject and token.
     * It is safe to assume that $attribute and $subject already passed the "supports()" method check.
     *
     * @param string $attribute
     * @param mixed User
     * @param TokenInterface $token
     *
     * @return bool
     */
    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        /** @var User $user */
        $user = $token->getUser();

        if (!($user instanceof User)) {
            return false;
        }
    }

    private function canEdit(User $subject, User $user)
    {
        return ($user === $subject) || in_array('ROLE_SUPER_ADMIN', $user->getRoles(), true);
    }

    private function canDelete(User $subject, User $user)
    {
        return ($user === $subject) || in_array('ROLE_SUPER_ADMIN', $user->getRoles(), true);
    }

    private function canCreate(User $subject, User $user)
    {
        return ($user === $subject) || in_array('ROLE_SUPER_ADMIN', $user->getRoles(), true);
    }

    private function canShow(User $subject, User $user)
    {
        return ($user === $subject) || true;
    }
}
