<?php

/**
 * @OA\Schema(
 *     type="object",
 *     title="Example login request",
 *     description="Some simple request login as example",
 * )
 */
class LoginRequest
{
    /**
     * @OA\Property(
     *     title="Email",
     *     description="User email",
     *     example="123@123.com",
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="Password",
     *     description="User password",
     *     example="12345678",
     * )
     *
     * @var string
     */
    public $password;
}
