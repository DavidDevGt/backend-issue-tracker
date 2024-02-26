<?php

namespace Middleware;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Slim\Psr7\Response;
use Helpers\EncryptData;

class AuthMiddleware {
    public function __invoke(Request $request, RequestHandler $handler): Response {
        // Obtenemos el token del encabezado de la solicitud
        $token = $request->getHeaderLine('Authorization');

        // Quitamos el prefijo 'Bearer ' del token
        $token = str_replace('Bearer ', '', $token);

        try {
            // Decodificamos el token utilizando nuestra clave secreta y método de encriptación
            $decoded = JWT::decode($token, new Key(EncryptData::getSecretKey(), EncryptData::getEncryptionMethod()));

            // Aquí puedes realizar verificaciones adicionales si es necesario

            // Si el token es válido, procedemos con la solicitud
            $response = $handler->handle($request);
            return $response;
        } catch (\Exception $e) {
            // Si el token no es válido, devolvemos un error
            $response = new Response();
            $response->getBody()->write(json_encode(['error' => 'Acceso no autorizado']));
            return $response->withStatus(401)->withHeader('Content-Type', 'application/json');
        }
    }
}
